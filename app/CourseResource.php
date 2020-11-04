<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
}
