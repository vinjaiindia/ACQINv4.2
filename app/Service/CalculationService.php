<?php
namespace App\Service;

use App\Model\Vehicle;
use App\Model\Road;

class CalculationService
{

    public static function timeTakenForDistanceCalculator(int  $total_distance_travelled , int $speed_limit, int $refuel_count , $time_to_refuel)
    {

        return  round(($total_distance_travelled  / $speed_limit) + ($refuel_count * $time_to_refuel ) ,2) ;    
    }

    public static function totalDistanceCalculator(int  $target_distance , int $refuel_count, int $refuel_distance)
    {
        return $target_distance  + ($refuel_count * $refuel_distance);

    }

    public static function refuelingCountCalculator(int $target_distance, int $max_distance_of_vehicle, int  $refuel_distance )
    {
        $cyclic_distance   = $max_distance_of_vehicle - $refuel_distance;  // 140
        return intval($target_distance / $cyclic_distance);
    }

}