<?php
namespace App\Service;

use App\Model\Vehicle;
use App\Model\Road;

class TravelService
{


    public function travel(Vehicle $vehicle , Road $type, int $distance_to_travel )
    {
        //Speed = Distance / Time; km /Hr
        
        $refuel_count               = 0;
        $total_distance_travelled   = 0;
        $total_time_taken           = 0;

        $refuel_distance            = $vehicle->refuel_distance_limit;
        $time_to_refuel_hrs         = $vehicle->time_to_refuel / 60;

        $max_distance               = $type->get_range($vehicle->max_distance_limit)  ;// 150
        $distance_to_garage         = $type->get_garage_distance();
        $speed_limit                = $type->get_speed_limit($vehicle); 

        $target_distance            = $distance_to_travel + $distance_to_garage;

        $refuel_count               = CalculationService::refuelingCountCalculator($target_distance, $max_distance, $refuel_distance );
	                
        $total_distance_travelled   = CalculationService::totalDistanceCalculator($target_distance, $refuel_count,  $refuel_distance);

        $total_time_taken           = CalculationService::timeTakenForDistanceCalculator($total_distance_travelled ,$speed_limit, $refuel_count , $time_to_refuel_hrs);
        
        return ["total_time" => $total_time_taken, "total_distance" => $total_distance_travelled , "refuel_count" =>$refuel_count];
    }




}