<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use \App\Service\CalculationService;
class CalculationServiceTest extends TestCase
{
    /**
     * A basic unit test for testing CalculationService for Refueling count
     *
     * @return void
     */
    public function testRefuelingCountCalculator()
    {
        extract(["target_distance" => 900, "max_distance" => 140, "refuel_distance" =>10]);
        $output     = CalculationService::refuelingCountCalculator($target_distance, $max_distance, $refuel_distance );
        $this->assertTrue($output  == 6);
    }

    /**
     * A basic unit test for testing CalculationService for Total Distance Calculation (Urban)
     *
     * @return void
     */
    public function testTotalDistanceCalculator()
    {
        extract(["target_distance" => 900, "refuel_count" => 6, "refuel_distance" =>10]);
        $output     = CalculationService::totalDistanceCalculator($target_distance, $refuel_count, $refuel_distance );
        $this->assertTrue($output  == 960);
    }

    

    /**
     * A basic unit test for testing CalculationService for Time taken for reaching distance via Urban Road
     *
     * @return void
     */
    public function testTimeTakenForUrbanDistanceCalculator()
    {
        extract(["total_distance_travelled" => 960 ,"speed_limit" => 140, "refuel_count" => 6 , "time_to_refuel_hrs" => 0.5]);
        $output     = CalculationService::timeTakenForDistanceCalculator($total_distance_travelled ,$speed_limit, $refuel_count , $time_to_refuel_hrs);
        $this->assertTrue($output  == 9.86);
    }

    /**
     * A basic unit test for testing CalculationService for Time taken for reaching distance via Rural Road
     *
     * @return void
     */
    public function testTimeTakenForRuralDistanceCalculator()
    {
        extract(["total_distance_travelled" => 960 ,"speed_limit" => 215, "refuel_count" => 6 , "time_to_refuel_hrs" => 0.5]);
        $output     = CalculationService::timeTakenForDistanceCalculator($total_distance_travelled ,$speed_limit, $refuel_count , $time_to_refuel_hrs);
        $this->assertTrue($output  == 7.47);
    }

}
