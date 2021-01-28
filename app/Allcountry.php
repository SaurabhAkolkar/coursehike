<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allcountry extends Model
{
    protected $table = 'allcountry';


    protected $fillable=[
	
		'iso', 'name', 'nicename', 'iso3', 'numcode'

	];
    

    public function states(){
    	return $this->hasMany('App\Allstate','country_id');
    }
}
