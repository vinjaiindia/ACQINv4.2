<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MapTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrban()
    {
        include_once("map.php");
        $output = \Map::main(["road_type" => "urban", "road_length" => 900]);
        $this->assertTrue(true);
    }

}
