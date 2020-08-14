<?php
namespace App\Model;

class Car
{
    public $max_speed_limit        = 70;
    public $max_distance_limit     = 200;
    public $refuel_distance_limit     = 10;
    public $time_to_refuel          = 30;

    private $distance;

    public function set_distance($distance)
    {
        $this->distance = $distance;
    }

    public function get_distance_to_travel()
    {
        return $this->distance ;
    }

}
