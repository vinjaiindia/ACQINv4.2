<?php
namespace App\Model;


abstract class Vehicle
{
    public $max_speed_limit        = 70;
    public $max_distance_limit     = 200;
    public $refuel_distance_limit  = 10;
    public $time_to_refuel         = 30;

}