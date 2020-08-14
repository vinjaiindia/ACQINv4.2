<?php
/**
 * 
 *
 * @package  Travel
 * @author   vinod jain
 */

require_once __DIR__.'/vendor/autoload.php';



$arr_option_names       = ["road_type::","road_length::"];
$arr_option_values      = getopt("",$arr_option_names);

$road_type              = $arr_option_values["road_type"];
$road_length            = $arr_option_values["road_length"];

$vehicle = new App\Model\Car;
$vehicle->set_distance($road_length);

$via    = App\Model\RoadFactory::create($road_type);

$travel = new App\Service\TravelService;
print_r($travel->travel($vehicle, $via));
