<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Model\RoadFactory;
use \App\Model\Car;
use \App\Service\TravelService;


class TravelCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map {--road_type=} {--road_length=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculation of [Total Distance Travelled, Time Taken, Refueled Count] when input is RoadType & Distance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {        
   
        $road_type              = $this->option("road_type");
        $distance               = $this->option("road_length");

        $via                    = RoadFactory::create($road_type);
        if($via != null )
        {
            $vehicle    = new Car;
            $travel     = new TravelService;
            $stats      = $travel->travel($vehicle, $via , $distance);
            $this->line("Total Distance Travelled = $stats[total_distance] km");
            $this->line("Total Time Taken = $stats[total_time] hrs") ;
            $this->line("Refuel Count  = $stats[refuel_count]");
        }
        else
        {
            throw new Exception("Road Type Not Implemented.");
        }

        return 0;
    }
}
