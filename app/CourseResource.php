<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class CourseResource extends Model
{
	use HasTranslations;
    
    public $translatable = ['file_name'];

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

    protected $table = 'course_resources';

    protected $fillable = [ 'course_id', 'file_name', 'file_url', 'status' ];

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function getFileUrlAttribute($value)
    {
        // return Storage::temporaryUrl(
        //     config('path.course.resources').$this->course_id. '/' . $value, now()->addMinutes(5)
        // );
        // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
        return config('path.course.resources').$this->course_id. '/' . $value;
    }
}
