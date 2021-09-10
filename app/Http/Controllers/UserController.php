<?php

namespace App\Http\Controllers;


use App\Models\Pickpoint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

       User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=> bcrypt($request->password),
       ]);


        return redirect()->route('car.index');
    }

    public function login()
    {
        return view('user.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = Auth::user();
            session()->flash('success', 'login successful');
            if ($user->getRole() == 'admin')
                return redirect()->route('admin.index');
            if ($user->getRole() == 'manager')
                return redirect()->route('manager.index');
            if ($user->getRole() == 'client')
                return redirect()->route('home');
        }
        return redirect()->back()->with('error','incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }

    public function showManagers()
    {
        $managers = User::where('role','manager')->get();
        return view('admin.manager.index',compact('managers'));
    }

    public function editManagerShow($id)
    {
        $manager = User::find($id);
        $pickpoints = Pickpoint::all();
        return view('admin.manager.update',compact('manager', 'pickpoints'));
    }

    public function editManager(Request $request)
    {
        $manager = User::find($request->id);
        $manager->name = $request->name;
        $manager->pickpoint_id = $request->pickpoint_id;
        $manager->save();
        return redirect()->route('user.index.managers');
    }

    public function deleteManager(Request $request)
    {
        $manager = User::find($request->id);
        $manager->delete();
        return redirect()->route('user.index.managers');
    }

    public function showClients()
    {
        $clients = User::where('role','client')->get();
        return view('admin.client.index', compact('clients'));
    }

    public function deleteClient(Request $request)
    {
        $client = User::find($request->id);
        $client->delete();
        return redirect()->route('user.index.clients');
    }

    public function editClientShow($id)
    {
        $client = User::find($id);
        return view('admin.client.update', compact('client'));
    }

    public function editClient(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);
        $client = User::find($request->id);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        return redirect()->route('user.index.clients');
    }

    public function toManagerShow($id)
    {
        $tomanager = User::find($id);
        $pickpoints = Pickpoint::all();
        return view('admin.client.futuremanager', compact('tomanager', 'pickpoints'));
    }

    public function addManager(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pickpoint_id' => 'required|numeric'
        ]);
        $manager = User::find($request->id);
        $manager->role = 'manager';
        $manager->pickpoint_id = $request->pickpoint_id;
        $manager->save();
        return redirect()->route('user.index.clients');
    }
}
