<?php

namespace App\Http\Controllers;

use App\Jobs\UnbookCarJob;
use App\Models\Car;
use App\Models\Pickpoint;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index()
    {
        $pickpoints = Pickpoint::all();
        return view('front.index',compact('pickpoints'));
    }

    public function pickpointShow($id)
    {
        $cars = Car::where('pickpoint_id',$id)->where('booked', false)->get();
        foreach ($cars as $car)
        {
            $car->book_id = "http://testapp/pickpoint/car/" . "$car->id";
        }

        return view('front.pickpoint', compact('cars'));
    }

    public function bookCar($id)
    {
        $car = Car::find($id);
        $car->booked = true;
        $now = Carbon::now();
        $now->addMinutes(1);
        $car->booked_until = $now;
        $car->save();

        return redirect()->route('home');
    }
}
