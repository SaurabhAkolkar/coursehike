<?php

use Stevebauman\Location\Facades\Location;

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

function getSymbol(){
    $position = Location::get();
 
    if($position){
        $location = $position->countryName;

        if($location == 'India'){
            return '₹';
        }else{
            return '$';
        }
    }
    return '$';
}

function getLocation(){
    $position = Location::get();
    if($position){
        return $position->countryCode;
    }
    return 'USD';
}