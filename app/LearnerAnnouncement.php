<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Storage;

class LearnerAnnouncement extends Model
{
    use HasTranslations;

    public $translatable = ['announsment'];

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

    protected $table = 'learner_announcements';

    protected $fillable = ['user_id', 'title','short_description', 'category_id','long_description','preview_image','stream_video','layout','preview_video','status'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getPreviewImageAttribute($value){
        if($value != null){
            return Storage::url(config('path.announcement.img'). $value);
       }else{
           return asset('/images/default-images/interest-default.jpg');
       }
    }
}
