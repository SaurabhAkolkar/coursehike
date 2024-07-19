<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ReviewRating extends Model
{
    use HasTranslations;
    
    public $translatable = ['review'];

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

    protected $table = 'review_ratings'; 

    protected $fillable = [
        'course_id', 'user_id', 'rating','learn', 'price', 'value', 'review_message', 'status', 'approved', 
        'featured'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getAverageRatingAttribute()
    {
        return $this->average('rating');
    }
    
    public function courses()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }
}
