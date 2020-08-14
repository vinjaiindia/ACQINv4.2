<?php
namespace App\Service;

use App\Model\Car;
use App\Model\Road;

class TravelService
{


    public function travel(Car $vehicle , Road $type)
    {
        //Speed = Distance / Time; km /Hr
        
        $refuel_count = 0;
        $total_distance_travelled = 0;
        $total_time_taken = 0;

        $target_distance = $vehicle->get_distance_to_travel();
        $refuel_distance = $vehicle->refuel_distance_limit;
        $time_to_refuel = $vehicle->time_to_refuel/60;

        $max_distance =  $type->get_range($vehicle->max_distance_limit)  ;// 150
        $distance_to_garage = $type->get_garage_distance();

        $speed_limit = $type->get_speed_limit($vehicle); 

        $total_distance = $target_distance + $distance_to_garage;

        $cyclic_distance = $max_distance - $refuel_distance;  // 140
    
        $refuel_count = intval($total_distance / $cyclic_distance);
	
        $remaining_distance = $total_distance % $cyclic_distance;
                
        $total_distance_travelled = $total_distance  + ($refuel_count * $refuel_distance);
        
        $total_time_taken = round(($total_distance_travelled  / $speed_limit) + ($refuel_count * $time_to_refuel ) ,2) ;    

        return ["Total Time (Hrs)" => $total_time_taken, "Total Distance (KM)" => $total_distance_travelled , "Refueled Count" =>$refuel_count];
    }

}