<?php
namespace App\Model;

use App\Model\Car;

abstract class Road
{
    abstract  public function get_range($range);
    abstract  public function get_garage_distance();
    abstract  public function get_speed_limit(Car $vehicle);
    
}