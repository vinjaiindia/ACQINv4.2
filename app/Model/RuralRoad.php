<?php
namespace App\Model;

use App\Model\IRoadRange;
use App\Model\Road;

class RuralRoad extends Road implements IRoadRange
{
    function __construct()
    {

    }
    function get_range($range)
    {
        return $range;
    }
    public function get_garage_distance()
    {
        return 50;
    }

    public function get_speed_limit(Car $vehicle)
    {
        return $vehicle->max_speed_limit * 1.15;
    }

}