<?php

namespace App\Jobs;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UnbookCarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
//    private $car_id;

    public function __construct()
    {
//        $this->car_id = $id;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cars = Car::where('booked', true)->where('ocupied',false)->get();
        foreach ($cars as $car)
        {
            if ($car->booked_until < Carbon::now())
            {
                $car->booked = false;
                $car->booked_until = null;
                $car->save();
            }

        }



        logs()->warning(" working");
    }
}
