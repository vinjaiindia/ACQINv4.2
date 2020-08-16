<?php
/**
 * 
 *
 * @package  Travel
 * @author   vinod jain
 */

require_once __DIR__.'/vendor/autoload.php';

class Map
{
    public static function main($arr_option_values)
    {
        
        $road_type              = $arr_option_values["road_type"];
        $road_length            = $arr_option_values["road_length"];
        
        $vehicle = new App\Model\Car;
        
        $via    = App\Model\RoadFactory::create($road_type);
        if($via != null )
        {
            $travel = new App\Service\TravelService;
            return $travel->travel($vehicle, $via, $road_length);
        }
        else
        {
            throw new Exception("Invalid Road Type");
        }
        
    }
}

$arr_option_names       = ["road_type::","road_length::"];
$arr_option_values      = getopt("",$arr_option_names);

if($arr_option_values)
{
    print_r(Map::main($arr_option_values));
}
