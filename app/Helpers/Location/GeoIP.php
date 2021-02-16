<?php 

namespace App\Helpers\Location;

use Illuminate\Support\Fluent;
use Stevebauman\Location\Position;
use Stevebauman\Location\Drivers\Driver;

class GeoIP extends Driver
{
    public function url($ip)
    {
        return "http://www.geoplugin.net/json.gp?ip=$ip";
    }
    
    protected function process($ip)
    {
        return rescue(function () use ($ip) {
            $response = json_decode(file_get_contents($this->url($ip)), true);
            
            return new Fluent($response);
        }, $rescue = false);
    }

    protected function hydrate(Position $position, Fluent $location)
    {
        $position->ip = $location->geoplugin_countryCode;
        $position->countryName = $location->geoplugin_countryName;
        $position->countryCode = $location->geoplugin_request;
        $position->latitude = $location->geoplugin_latitude;
        $position->longitude = $location->geoplugin_longitude;
        $position->currencyCode = $location->geoplugin_currencyCode;
        $position->currencySymbol = $location->geoplugin_currencySymbol_UTF8;

        return $position;
    }
}

?>