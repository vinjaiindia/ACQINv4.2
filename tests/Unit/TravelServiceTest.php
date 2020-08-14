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
    public function testService()
    {

        $road_type              = "urban";
        $road_length            = 900;
        
        $vehicle = new \App\Model\Car;
        $vehicle->set_distance($road_length);
        
        $via    = \App\Model\RoadFactory::create($road_type);
        if($via != null )
        {
            $travel = new \App\Service\TravelService;
            $result = $travel->travel($vehicle, $via);
            $this->assertTrue($result["Total Time (Hrs)"] == 21.67);
            $this->assertTrue($result["Total Distance (KM)"] == 980);
            $this->assertTrue($result["Refueled Count"] == 6);
            return;
        }
        $this->assertTrue(false);
    }
}
