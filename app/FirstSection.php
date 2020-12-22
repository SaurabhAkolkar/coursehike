<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class FirstSection extends Model
{
    protected $fillable = ['id','heading','sub_heading','image','image_text'];


    public function getImageAttribute($value)
    {
        return Storage::url(config('path.firstsection'). $value);
    }
}
