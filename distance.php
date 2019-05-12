<?php
/**
 * Created by PhpStorm.
 * User: Ritz
 * Date: 5/12/2019
 * Time: 7:39 PM
 */

function shortest_distance($lat1, $long1, $lat2, $long2)
{

    $dis_cal = $long1 - $long2;
    $dis = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($dis_cal));
    $dis = acos($dis);
    $dis = rad2deg($dis);

    return $dis * 60 * 1.8531;  // Return Distance In Kilometers

}