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
use App\CourseChapter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
        'package_type','category_id','childcategory_id','subcategory_id', 'language_id', 'level', 'order','rating','user_id', 'title','short_detail', 'detail',  'price', 'discount_price','day','video', 'video_url', 'featured','requirement','url','slug','status','published','preview_image','video_preview_img', 'stream_video','type', 'preview_video', 'duration'
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

    public function multilingual()
    {
      return $this->hasMany('App\CourseClassMultilingual','course_id')->where('type', 'preview');
    }

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' .$searchTerm. '%');
    }

    public function getSlugAttribute($value)
    {
        if(!empty($value)){
            return $value;
       }else{
           return Str::of($this->title)->slug('-');
       }
    }

    public function getPreviewImageAttribute($value)
    {
        if($value != null){
            // return Storage::url(config('path.course.img'). $value);
            return config('path.course.image'). $value;
       }else{
           return asset('/images/default-images/course_default.png');
       }
    }

    public function getVideoPreviewImgAttribute($value)
    {
        if($value != null){
            // return Storage::url(config('path.course.img'). $value);
            return config('path.course.image'). $value;
       }else{
           return $this->preview_image;
       }
    }

    public function getVideoCountAttribute(){

        return Cache::remember('class_video_count_'.$this->id, config('cache.time'), function () {
            return CourseClass::where('course_id', $this->id)->count();
        });
    }

    public function getChapterCountAttribute(){

        // $chapter = CourseChapter::where('course_id', $this->id)->count();

        return Cache::remember('class_chapter_count_'.$this->id, config('cache.time'), function () {
            return CourseChapter::where('course_id', $this->id)->count();
        });
    }


    public function getConvertedpriceAttribute(){

        $value = (int) filter_var($this->price, FILTER_SANITIZE_NUMBER_INT);
        
        $setting = Setting::first();
        $dollar_price = 70;

        if($setting && $setting->dollar_price){
            $dollar_price = $setting->dollar_price;
        }
        
        if( getLocation() == 'IN')
            return $value * $dollar_price;
        else
            return $value;
        
    }

    public function isPurchased()
    {
        if(Auth::check())
        {
            $purchased_course = UserPurchasedCourse::where(['course_id'=> $this->id , 'user_id'=> Auth::User()->id])
                                ->orWhere( function($query) {
                                    // Accept int datatype
                                    $query->orWhereJsonContains( 'class_id', (int) $this->id )
                                        ->where('user_id', '=', Auth::User()->id);
                                })
                                ->orWhere( function($query) {
                                    // Accept String datatype
                                    $query->orWhereJsonContains( 'class_id', $this->id.'' )
                                        ->where('user_id', '=', Auth::User()->id);
                                })->firstOr(function () {
                                    return null;
                                });
            return $purchased_course;
        }

        return null;
    }

    public function getCheckWishlistAttribute(){
            if(Auth::check()){
                $wishlist = Wishlist::where(['user_id' => Auth::user()->id, 'course_id' =>  $this->id])->first();

                return $wishlist?true:false;
            }   
            return false;
    }

    public function getCheckCartAttribute(){

        if(Auth::check()){

            $cart = Cart::where(['user_id' => Auth::user()->id, 'course_id' =>  $this->id, 'status' => 1])->first();

            return $cart?true:false;
        }   
        return false;
    }
  

    public function getLearnerCountAttribute()
    {
        // $count = (100 + $this->id + strlen($this->title) + $this->courseclass->count());
        // $purchased_courses = UserPurchasedCourse::where(['course_id' => $this->id])->groupBy('user_id')->pluck('user_id')->toArray();
        
        // if($purchased_courses !=null){
        //     $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->whereNotIn('user_id', $purchased_courses)->groupBy('course_id')->count();            
        //     // $count = $count + $subscribers;
        //     $count = $subscribers + count($purchased_courses);
        // }else{
        //     $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->groupBy('course_id')->count();
        //     // $count = $count + $subscribers;
        //     $count = $subscribers;
        // }

        return Cache::remember('class_learners_count_'.$this->id, config('cache.time'), function () {
            $purchased_courses = UserPurchasedCourse::where(['course_id' => $this->id])->groupBy('user_id')->pluck('user_id')->toArray();
            if($purchased_courses !=null){
                $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->whereNotIn('user_id', $purchased_courses)->groupBy('course_id')->count();
                $count = $subscribers + count($purchased_courses);
            }else{
                $subscribers = UserWatchTimelog::where(['course_id'=>$this->id])->groupBy('course_id')->count();
                $count = $subscribers;
            }
            return $count;
        });
    }

    public function getAverageRatingAttribute()
    {
        $avgRating = Cache::remember('class_avg_rating_'.$this->id, config('cache.time'), function () {
            $avgRating = $this->review->avg('rating');
            
            if($avgRating == 0 || empty($avgRating))
                $avgRating = $this->masterclass ? 5 : 4;

            return $avgRating;
        });
        return $avgRating;
    }

    public function getProgress()
    {
        if(Auth::check()){

            $classes = $this->courseclass->count();

            $lastWatchedCourse = UserWatchProgress::where([ 'course_id'=> $this->id, 'user_id'=>Auth::User()->id ])->get();

            $courseCompletion = 0;
            if($lastWatchedCourse){
                $lastWatchedCourseAvg = $lastWatchedCourse->avg('current_position');
                $lastWatchedCourseCount = $lastWatchedCourse->count();
                $courseCompletion = round(abs($lastWatchedCourseAvg / (abs($classes - $lastWatchedCourseCount)+1)));
            }
            return $courseCompletion;
        }
        else{
            return 0;
        }
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
            'exp' => time() + 28800,
            'kid' => env('CLOUDFLARE_Signing_KEY'),
            'sub' => $this->stream_video,
        );
        
        $jwt = JWT::encode($payload, $privateKey, 'RS256');
        return 'https://videodelivery.net/'.$jwt.'/manifest/video.m3u8';
        // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    }
}
