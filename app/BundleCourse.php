<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Storage;
use Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BundleCourse extends Model
{
    use HasTranslations;
    
    public $translatable = ['title', 'detail'];

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
    
    protected $table = 'bundle_courses';

    protected $fillable = ['user_id', 'course_id', 'title', 'level', 'category_id','detail', 'price', 'discount_price', 'type', 'slug', 'status', 'featured', 'preview_image'];

    protected $casts = [
    	'course_id' => 'array'
    ];

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function getCourses()
    {
        return Cache::remember('courses_get_classes_'.  $this->id, config('cache.time'), function () {
            return Course::whereIn('id', $this->course_id)->get();
        });
    }

    public function getAverageRatingAttribute()
    {
        $avgRating = $this->getCourses()->average('average_rating');
        return $avgRating;
    }

    public function reviews(){

        return Cache::remember('courses_review_'.  $this->id, config('cache.time'), function () {
            $course_ids = $this->getCourses()->pluck('id')->toArray();
            return ReviewRating::whereIn('course_id',$course_ids)->get();
        });
    }

    public function User()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function isPurchased()
    {
        if(Auth::check())
        {
            $purchased_course = UserPurchasedCourse::where(['bundle_id'=> $this->id , 'user_id'=> Auth::User()->id])->firstOr(function () {
                return null;
            });
            return $purchased_course;
        }

        return null;
    }

    
    public function getConvertedpriceAttribute(){

        $value = $this->price;
        
        $setting = Setting::first();
        $dollar_price = null;

        if($setting && $setting->dollar_price){
            $dollar_price = $setting->dollar_price;
        }else{
           $dollar_price = 70;
        }
        
        if( getLocation() == 'IN')
            return $value * $dollar_price;
        else
            return $value;
        
    }

    public function users(){
        
        return Cache::remember('courses_users_'.  $this->id, config('cache.time'), function () {
            $user_id = $this->getCourses()->pluck('user_id')->toArray();
            $users = User::whereIn('id', $user_id)->get();
            return $users;
        });
    }

    public function getLearnerCountAttribute(){
        return Cache::remember('courses_learner_count_'.  $this->id, config('cache.time'), function () {
            return $this->getCourses()->sum('learnerCount');
        });
    }

    public function videoCount(){
        // $videos = CourseClass::whereIn('course_id', $this->course_id)->count();

        return Cache::remember('courses_video_count_'.  $this->id, config('cache.time'), function () {
            return CourseClass::whereIn('course_id', $this->course_id)->count();;
        });
    }

    public function category()
    {
    	return $this->belongsTo('App\Categories','category_id','id');
    }

    public function order()
    {
        return $this->hasMany('App\Order','bundle_id');
    }

    public function getPreviewImageAttribute($value)
    {
        if($value != null){
             return Storage::url(config('path.course.img'). $value);
        }else{
            return asset('/images/default-images/course_default.png');
        }
    }

    public function getProgressAttribute(){
        
        $courses = $this->getCourses();
        $progress = 0;
        foreach($courses as $c){
            $progress = $progress + $c->getProgress();
        }
        if($progress > 0){
            $progress = $progress/count($courses);
        }

        return $progress;
    }

    public function isCompleted()
    {
        return ($this->progress == 100);
    }
}
