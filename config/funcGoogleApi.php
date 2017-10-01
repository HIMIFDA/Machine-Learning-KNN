<?php

error_reporting(0);

function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key=AIzaSyBXKDxdGH27Zuo89l05fLtgjoGzsMS5A3Q');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key=AIzaSyBXKDxdGH27Zuo89l05fLtgjoGzsMS5A3Q');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles.' mi';
    }
}

//To specify a Google API key in your request, include it as the value of a key parameter.

$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&key=GoogleAPIKey');
?>