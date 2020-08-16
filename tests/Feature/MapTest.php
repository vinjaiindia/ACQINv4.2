<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MapTest extends TestCase
{
    /**
     * A basic Feature test for testing console app with Road Type = urban & Road Length
     *
     * @return void
     */
    public function testUrban()
    {
        $result = ["980","21.85", "6"];
        $this->artisan("map", ["--road_type" => "urban",   "--road_length"  => 900])
                ->expectsOutput("Total Distance Travelled = $result[0] km")
                ->expectsOutput("Total Time Taken = $result[1] hrs")
                ->expectsOutput("Refuel Count  = $result[2]")
                ->assertExitCode(0);
        
    }
    /**
     * A basic Feature test for testing console app with Road Type = rural & Road Length
     *
     * @return void
     */

    public function testRural()
    {
        $result = ["1000","15", "5"];
        $this->artisan("map", ["--road_type" => "rural",   "--road_length"  => 900])
                ->expectsOutput("Total Distance Travelled = $result[0] km")
                ->expectsOutput("Total Time Taken = $result[1] hrs")
                ->expectsOutput("Refuel Count  = $result[2]")
                ->assertExitCode(0);
    }
}
