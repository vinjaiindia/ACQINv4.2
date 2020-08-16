<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TravelServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUrbanService()
    {

        $road_type              = "urban";
        $road_length            = 900;
        
        $vehicle = new \App\Model\Car;
        
        $via    = \App\Model\RoadFactory::create($road_type);
        if($via != null )
        {
            $travel = new \App\Service\TravelService;
            $result = $travel->travel($vehicle, $via, $road_length);
            $this->assertTrue($result["total_time"] == 21.85);
            $this->assertTrue($result["total_distance"] == 980);
            $this->assertTrue($result["refuel_count"] == 6);
            return;
        }
        $this->assertTrue(false);
    }
    public function testRuralService()
    {

        $road_type              = "rural";
        $road_length            = 900;
        
        $vehicle = new \App\Model\Car;
        
        $via    = \App\Model\RoadFactory::create($road_type);
        if($via != null )
        {
            $travel = new \App\Service\TravelService;
            $result = $travel->travel($vehicle, $via, $road_length);
            $this->assertTrue($result["total_time"] == 15);
            $this->assertTrue($result["total_distance"] == 1000);
            $this->assertTrue($result["refuel_count"] == 5);
            return;
        }
        $this->assertTrue(false);
    }

}
