<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deletuser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('allUser')->with('massege', 'Deleted Successfully For User');
    }


    public function index()
    {
        $user = User::all();
        return view('user.users', ['user'=>$user]);
    }



    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }


    public function save(Request $request)
    {
        $old_id = $request->old_id;
        $user = User::findOrFail($old_id);

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:25',
            'email' => 'required|min:6|email|max:255',
            'password' => 'required|min:8|max:255'

        ]);

        if ($request->has('role')) {
            $role= $request->role;
        }else{
            $role= $request->Old_role;

        }
        if ($request->has('status')) {
            $status=$request->status;
        }else{
            $status=$request->Old_status;

        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $role,
            "status" => $status,
            "password" => $request->password,
        ]);
        return redirect()->route('allUser')->with('massege', 'Update User Successfully');
    }
}
