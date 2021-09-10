<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Pickpoint;
use Illuminate\Http\Request;

class CarController extends Controller
{


    public function index()
    {
        $cars =Car::all();
        return view('admin.car.index', compact('cars'));
    }

    public function create()
    {
        $pickpoints = Pickpoint::all();
        return view('admin.car.create',compact('pickpoints'));
    }

    public function store(Request $request)
    {   $request->validate([
        'model' => 'required',
        'pickpoint_id' => 'required|numeric',
        'year' => 'required|numeric',
        'image' => 'required|image'
        ]);

        $data = $request->all();
        $data['image'] = "http://testapp/storage/app/" . Car::uploadImage($request);

        Car::create($data);
        return redirect()->route('car.index');
    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('car.index');
    }

    public function show($id)
    {
        $car = Car::find($id);
        $pickpoints = Pickpoint::all();
        return view('admin.car.update', compact('car','pickpoints'));
    }

    public function update(Request $request)
    {
        $car = Car::find($request->id);
        $car->model = $request->model;
        $car->pickpoint_id = $request->pickpoint_id;
        $car->save();
        return redirect()->route('car.index');
    }
}
