<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        $rents = Rent::where('manager_id', Auth::id())->get();
        return view('manager.index', compact('rents'));
    }

    public function rentCarIndex()
    {
        $pickpoint_id = Auth::user()->pickpoint_id;
        $cars = Car::where('pickpoint_id',$pickpoint_id)->where('ocupied',false)->where('booked',false)->get();
        $bookedcars = Car::where('pickpoint_id',$pickpoint_id)->where('booked',true)->where('ocupied',false)->get();
        return view('manager.rentcar.rentcar', compact('cars','bookedcars'));
    }

    public function rentCar(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'renttime' => 'required'
        ]);
        if (isset($request->bookedcar_id))
        {
            $car = Car::find($request->bookedcar_id);
            $car->ocupied = true;
            $car->user_id = $request->client_id;
            $car->save();
        }
        elseif (isset($request->car_id))
        {
            $car = Car::find($request->car_id);
            $car->ocupied = true;
            $car->booked = true;
            $car->user_id = $request->client_id;
            $car->save();
        }
        else
            return redirect()->back()->with('error', 'Choose car to rent');

        $client = User::find($request->client_id);
        $client->car_id = $car->id;
        $client->save();

        $rent = new Rent();
        $rent->car_id = $car->id;
        $rent->manager_id = Auth::user()->id;
        $rent->client_id = $request->client_id;
        $rent->cost = 100*($request->renttime);
        $rent->save();

        return redirect()->route('manager.index');
    }

    public function stopRentIndex()
    {
        $pickpoint_id = Auth::user()->pickpoint_id;
        $ocupiedcars = Car::where('ocupied', true)->where('pickpoint_id',$pickpoint_id)->get();
        return view('manager.rentcar.stoprent', compact('ocupiedcars'));
    }

    public function stopRent($id)
    {
        $car = Car::find($id);
        $client =User::find($car->user_id);
        $car->booked = false;
        $car->ocupied = false;
        $car->user_id = null;
        $car->booked_until = null;
        $car->save();
        $client->car_id = null;
        $client->save();
        return redirect()->route('manager.index');
    }
}
