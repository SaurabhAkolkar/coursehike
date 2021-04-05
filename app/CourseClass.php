<?php

namespace App;

use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Auth;
use App\Course;

class CourseClass extends Model
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

    protected $table = 'course_classes'; 

    protected $fillable = [
        'course_id', 'coursechapter_id', 'title', 'duration', 'featured', 'status','url', 'size',
        'image','   ','pdf','zip', 'preview_video', 'date_time', 'audio', 'detail', 'position', 'aws_upload', 'type'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }   

    public function getClasses(){
        $course_ids = CourseClass::where('video','like','%'.$this->video.'%')->pluck('course_id')->toArray();
         
        $courses = Course::whereIn('id',$course_ids)->get();

        return $courses;
    }

	  public function coursechapters()
    {
    	return $this->belongsTo('App\CourseChapter','coursechapter_id','id');
    }
     
    public function viewprocess()
    {
     return $this->hasMany('App\ViewProcess','courseclass_id');
    }

    public function subtitle()
    {
      return $this->hasMany('App\Subtitle','c_id');
    }

    public function audio()
    {
      return $this->hasMany('App\AudioTrack','c_id');
    }

    public function getImageAttribute($value)
    {
        return Storage::url(config('path.course.video_thumnail').$this->course_id. '/' . $value);
    }

     public function getProgress(){
        if(Auth::check()){
            $data = UserWatchProgress::where(['user_id'=>Auth::user()->id, 'class_id' => $this->id])->first();
            if($data){
                return $data->current_position;

           }
           else{
               return null;
           }
        }

        return null;
    }

    // public function getVideoAttribute($value)
    // {
    //     return Storage::temporaryUrl(
    //         config('path.course.video').$this->course_id. '/' . $value, now()->addMinutes(60)
    //     );
    //     // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    // }

    public function getSignedStreamURL()
    {
        $privateKey = base64_decode(env('CLOUDFLARE_PEM_KEY'));
        $payload = array(
            // "iss" => "example.org",
            // "aud" => "example.com",
            'exp' => time() + (60 * 60 * 6),
            'kid' => env('CLOUDFLARE_Signing_KEY'),
            'sub' => $this->stream_url,
        );
        
        $jwt = JWT::encode($payload, $privateKey, 'RS256');
        return 'https://videodelivery.net/'.$jwt.'/manifest/video.m3u8';
        // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    }

   
}
