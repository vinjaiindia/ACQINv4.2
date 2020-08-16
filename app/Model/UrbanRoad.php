<?php
namespace App\Model;

use App\Model\IRoadRange;
use App\Model\IGarageDistance;
use App\Model\Road;

class UrbanRoad extends Road implements IRoadRange,IGarageDistance
{
    function __construct()
    {

    }

    public function get_range($range)
    {
        return $range * .75;
    }

    public function get_garage_distance()
    {
        return 20;
    }

    public function get_speed_limit(Vehicle $vehicle)
    {
        return $vehicle->max_speed_limit * 0.75;
    }    

}