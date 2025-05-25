<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class StoreUserController extends Controller
{



    protected function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('home')->with('massege', 'add Successfully For User');
    }


}
