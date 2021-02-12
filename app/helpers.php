<?php

use Stevebauman\Location\Facades\Location;

function getSymbol(){
    $position = Location::get('2402:3a80:1443:b401:b903:6d28:6317:3efc');
    $location = $position->countryName;

    if($location == 'India'){
        return '₹';
    }else{
        return '$';
    }
}