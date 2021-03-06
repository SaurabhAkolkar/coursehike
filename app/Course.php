<?php

namespace App;

use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use App\UserPurchasedCourse;
use App\UserWatchTimelog;
use Stevebauman\Location\Facades\Location;
use App\Setting;
use Illuminate\Support\Facades\Auth;


class Course extends Model
{
    use HasTranslations;
    
    public $translatable = ['title', 'short_detail', 'detail', 'requirement'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $name) {
          $attributes[$name] = $this->getTranslation($name, app()->getLocale());
      }
      
      return $attributes;
    }

    protected $table = 'courses';  

    protected $fillable = [
        'category_id','childcategory_id','subcategory_id', 'language_id', 'level', 'rating','user_id', 'title','short_detail', 'detail',  'price', 'discount_price','day','video', 'video_url', 'featured','requirement','url','slug','status','published','preview_image', 'type', 'preview_video', 'duration'
    ];

    public function chapter()
    {
    	return $this->hasMany('App\CourseChapter','course_id');
    }

    public function whatlearns()
    {
        return $this->hasMany('App\WhatLearn','course_id');
    }

    public function include()
    {
        return $this->hasMany('App\CourseInclude','course_id');
    }

    public function related()
    {
        return $this->hasMany('App\RelatedCourse','course_id');
    }

    public function question()
    {
        return $this->hasMany('App\Question','course_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer','course_id');
    }

    public function announsment()
    {
        return $this->hasMany('App\Announcement','course_id');
    }

    public function courseclass()
    {
        return $this->hasMany('App\CourseClass','course_id');
    }

    public function resources()
    {
    	return $this->hasMany('App\CourseResource','course_id');
    }

    public function favourite()
    {
        return $this->hasMany('App\Favourite','course_id');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist','course_id');
    }

    public function review()
    {
        return $this->hasMany('App\ReviewRating','course_id');
    }

    public function reportreview()
    {
        return $this->hasMany('App\ReportReview','course_id');
    }

    public function instructor()
    {
        return $this->hasMany('App\Question','instructor_id');
    }

    public function masterclass()
    {
        return $this->hasOne('App\MasterClass','course_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order','course_id');
    }

    public function pending()
    {
        return $this->hasMany('App\PendingPayout','course_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Categories','category_id','id');
    }

    public function language()
    {
        return $this->belongsTo('App\CourseLanguage','language_id','id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' .$searchTerm. '%');
    }

    public function getPreviewImageAttribute($value)
    {
        return Storage::url(config('path.course.img'). $value);
    }


    public function getConvertedpriceAttribute(){

        $value = $this->price;

        $position = Location::get();
        
        $setting = Setting::first();
        $dollar_price = null;

        if($setting && $setting->dollar_price){
            $dollar_price = $setting->dollar_price;
        }else{
           $dollar_price = 70;
        }
        
        if($position){
            if ( $position->countryName == 'India') {
                return $value * $dollar_price;
            } else {
               
            }
        }else{
            return $value;
        }   
        
    }

    public function isPurchased()
    {
        if(Auth::check())
        {
            $purchased_course = UserPurchasedCourse::where(['course_id'=> $this->id , 'user_id'=> Auth::User()->id])->firstOr(function () {
                return null;
            });;
            return $purchased_course;
        }

        return null;
    }

  

    public function getLearnerCountAttribute()
    {
        $count = 0;
        $purchased_courses = UserPurchasedCourse::where(['course_id' => $this->id])->groupBy('user_id')->pluck('user_id')->toArray();
        
        if($purchased_courses !=null){
            $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->whereNotIn('user_id', $purchased_courses)->groupBy('course_id')->count();            
            $count = $count + $subscribers;
            $count = $count + count($purchased_courses);
        }else{

            $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->groupBy('course_id')->count();
            $count = $count + $subscribers;
        }
        return $count;
    }

    public function getAverageRatingAttribute()
    {
        $rating = 0;
        $avgRating = ReviewRating::where(['course_id' => $this->id])->avg('rating');
        return $avgRating;
    }

    public function getProgress()
    {
        $classes = $this->courseclass->count();

        $lastWatchedCourse = UserWatchProgress::where([ 'course_id'=> $this->id, 'user_id'=>Auth::User()->id ])->get();

        $courseCompletion = 0;
        if($lastWatchedCourse){
            $lastWatchedCourseAvg = $lastWatchedCourse->avg('current_position');
            $lastWatchedCourseCount = $lastWatchedCourse->count();
            $courseCompletion = $lastWatchedCourseAvg / (($classes - $lastWatchedCourseCount)+1);
        }
        return $courseCompletion;
    }

    public function isCompleted()
    {
        return ($this->getProgress() == 100);
    }

    public function getPreviewVideoAttribute($value)
    {
        return Storage::url(config('path.course.preview_video'). $value);
    }

    public function getSignedStreamURL()
    {
        $privateKey = base64_decode(env('CLOUDFLARE_PEM_KEY'));
        $payload = array(
            // "iss" => "example.org",
            // "aud" => "example.com",
            'exp' => time() + 60,
            'kid' => env('CLOUDFLARE_Signing_KEY'),
            'sub' => $this->stream_video,
        );
        
        $jwt = JWT::encode($payload, $privateKey, 'RS256');
        return 'https://videodelivery.net/'.$jwt.'/manifest/video.m3u8';
        // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    }
}
