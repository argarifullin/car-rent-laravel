<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Pickpoint;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportManagerSelect()
    {
        $items = User::where('role','manager')->get();
        $title = 'manager';
        return view('admin.report.select', compact('title', 'items'));
    }

    public function reportManager(Request $request)
    {
        $request->validate([
            'manager_id' => 'required|numeric'
        ]);
        $title = 'manager';
        $report = Rent::where('manager_id',$request->manager_id)->get();
        return view('admin.report.show', compact('report','title'));
    }

    public function reportPickpointSelect()
    {
        $title = 'pickpoint';
        $items = Pickpoint::all();
        return view('admin.report.pickpointselect', compact('title', 'items'));
    }

    public function reportPickpoint(Request $request)
    {
        $request->validate([
            'pickpoint_id' => 'required|numeric'
        ]);
        $title = 'pickpoint';
        $manager = User::where('pickpoint_id', $request->pickpoint_id)->first();
        $report = Rent::where('manager_id', $manager->id)->get();
        return view('admin.report.show', compact('report','title'));
    }

    public function reportCarSelect()
    {
        $title = 'car';
        $items = Car::all();
        return view('admin.report.carselect', compact('title', 'items'));
    }

    public function reportCar(Request $request)
    {
        $request->validate([
            'car_id' => 'required|numeric'
        ]);
        $title = 'car';
        $report = Rent::where('car_id',$request->car_id)->get();
        return view('admin.report.show', compact('report','title'));
    }

    public function reportClientSelect()
    {
        $items = User::where('role','client')->get();
        $title = 'client';
        return view('admin.report.select', compact('title', 'items'));
    }

    public function reportClient(Request $request)
    {
        $request->validate([
            'client_id' => 'required|numeric'
        ]);
        $title = 'client';
        $report = Rent::where('client_id',$request->client_id)->get();
        return view('admin.report.show', compact('report','title'));
    }
}
