<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Storage;

class Categories extends Model
{
    use HasTranslations;
    
    public $translatable = ['title'];

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

    protected $table = 'categories';  

    protected $fillable = [
        'title','icon','slug','featured','image','status', 'position'
    ]; 

    public function subcategory()
    {
    	return $this->hasMany('App\SubCategory','category_id');
    }

    public function courses()
    {   
        return $this->hasMany('App\Course','category_id');
    }

    public function getImageAttribute($value)
    {
        if($value != null){
            return Storage::url(config('path.category'). $value);
        }else{
            return asset('images/category/category.jpg');
        }
    }

}
