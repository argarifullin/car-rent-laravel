<?php

namespace App\Http\Controllers;

use App\Models\Pickpoint;
use Illuminate\Http\Request;

class PickpointController extends Controller
{
    public function index()
    {
        $pickpoints = Pickpoint::all();
        return view('admin.pickpoint.index',compact('pickpoints'));
    }

    public function create()
    {
        return view('admin.pickpoint.create');
    }

    public function store(Request $request)
    {   $request->validate([
        'address' => 'required|unique:pickpoints'
    ]);
        $pickpoint = new Pickpoint();
        $pickpoint->address = $request->address;
        $pickpoint->save();
        return redirect()->route('pickpoint.index');
    }

    public function delete($id)
    {
        $pickpoint = Pickpoint::find($id);
        $pickpoint->delete();
        return redirect()->route('pickpoint.index');
    }

    public function show($id)
    {
        $pickpoint = Pickpoint::find($id);
        return view('admin.pickpoint.update',compact('pickpoint'));
    }

    public function update(Request $request)
    {
        $pickpoint = Pickpoint::find($request->id);
        $pickpoint->address = $request->address;
        $pickpoint->save();
        return redirect()->route('pickpoint.index');
    }
}
