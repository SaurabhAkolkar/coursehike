<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use App\Setting;
use Stevebauman\Location\Facades\Location;

class CourseChapter extends Model
{
	use HasTranslations;
    
    public $translatable = ['chapter_name'];

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

    protected $table = 'course_chapters';

    protected $fillable = [ 'course_id', 'chapter_name', 'short_number', 'status', 'file' ];

    public function courseclass()
    {
        return $this->hasMany('App\CourseClass','coursechapter_id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function getThumbnailAttribute($value)
    {
        return Storage::url(config('path.course.class_thumnail').$this->course_id. '/' . $value);
    }

    public function getConvertedpriceAttribute(){

        $value = $this->price;
        
        $setting = Setting::first();
        $dollar_price = null;

        if($setting && $setting->dollar_price)
            $dollar_price = $setting->dollar_price;
        else
            $dollar_price = 70;
        
        if( getLocation() == 'IN')
            return $value * $dollar_price;
        else
            return $value;       
    }

}
