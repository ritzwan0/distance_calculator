<?php
/**
 * Created by PhpStorm.
 * User: Ritz
 * Date: 5/12/2019
 * Time: 7:19 PM
 */

include distance.php;

function solve($inputFile)
{
    /* Open the file & read all lines into an array */
    $result = [];
    $pattern = "";
    $city = "";
    $lat = "";
    $long = "";

    $fn = fopen($inputFile,"r");
    while(! feof($fn))  {
        $result = fgets($fn);
        }

    /* Split first line to get city, lat and long */
    $init_pattern = preg_split("\t", $result[0]); // convert tab separated pattern into array
    $init_city = $init_pattern[0];
    $init_Lat = $init_pattern[1];
    $init_Long = $init_pattern[2];
    $initial_distance = 9999;       // Set initial maximum constant distance



    $new_list = $init_city;

    unset($result[0]);  // Delete first line Beijing from array "result"
    $NumOfCities = count($result); // Count Number of elements in array
    for ($i = 0; $i < $NumOfCities; $i--)
    {

        foreach ($result as $value) // Loop through each element in array
        {
            $pattern = preg_split("\t", $value);
            $city = $pattern[0];
            $lat = $pattern[1];
            $long = $pattern[2];

            $short_distance = shortest_distance($init_Lat, $init_Long, $lat, $long ); // Calculate distance between two locations

            if ($initial_distance > $short_distance)
            {
                $initial_distance = $short_distance;
                $init_pattern = $value;
            }

        }
        if (($key = array_search($init_pattern, $result)) !== false) {
            unset($result[$key]);   // Delete Element with shortest route found from the array
            $init_city = $city;
            $init_Lat = $lat;
            $init_Long = $long;
            $new_list = $new_list . "\n" . $init_city;
        }
    }

    return $new_list;
}
$this->solve("cities.txt");








