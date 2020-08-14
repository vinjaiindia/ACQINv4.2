<?php

namespace App\Model;

use App\Model\UrbanRoad;
use App\Model\RuralRoad;
use App\Model\Road;



class RoadFactory
{
    public static function create($type) : Road
    {
        if($type == "urban")
            return new UrbanRoad;
        if($type == "rural")
            return new RuralRoad;

    }
}