<?php

namespace App;

use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CourseClassMultilingual extends Model
{

    protected $fillable = ['class_id', 'vid_lang', 'lang_code','video_path','stream_url'];

    
    public function getVideoPathAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) { 
            return  $value;
        }
        $course_class = CourseClass::find($this->class_id);
        return Storage::temporaryUrl(
            config('path.course.video').$course_class->course_id. '/' . $value, now()->addMinutes(60)
        );
    }

    public function getSignedStreamURL()
    {
        $privateKey = base64_decode(env('CLOUDFLARE_PEM_KEY'));
        $payload = array(
            'exp' => time() + (60 * 60 * 6),
            'kid' => env('CLOUDFLARE_Signing_KEY'),
            'sub' => $this->stream_url,
        );
        
        $jwt = JWT::encode($payload, $privateKey, 'RS256');
        return 'https://videodelivery.net/'.$jwt.'/manifest/video.m3u8';
    }
}
