<?php

use Stevebauman\Location\Facades\Location;

function getSymbol(){
    $position = Location::get();
    $location = $position->countryName;

    if($location == 'India'){
        return '₹';
    }else{
        return '$';
    }
}