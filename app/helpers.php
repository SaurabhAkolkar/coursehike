<?php

use Stevebauman\Location\Facades\Location;

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

function getSymbol(){
    
    $country_code = array_key_exists('HTTP_CF_IPCOUNTRY',$_SERVER)?$_SERVER["HTTP_CF_IPCOUNTRY"]:[];
    $location = "";
    if(!empty($country_code)){
        $location = $country_code;
    }else{
        $position = Location::get();
        if($position)
            $location = $position->countryCode;
    }

    if($location == 'IN'){
        return '₹';
    }
    return '$';
}

function getLocation(){
    
    $country_code = array_key_exists('HTTP_CF_IPCOUNTRY',$_SERVER)?$_SERVER["HTTP_CF_IPCOUNTRY"]:[];

    if(!empty($country_code)){
        return $country_code;
    }else{
        $position = Location::get();
        if($position)
            return $position->countryCode;
    }
    return 'US';
}