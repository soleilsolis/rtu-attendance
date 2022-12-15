<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->password),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? "",
            'last_name' => $request->last_name,
            'address' => $request->address,
            'section_id' => $request->section_id,
        ]);


        return $user;
    }
    

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);

        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name ?? "";
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->section_id = $request->section_id;
        $user->save();

        return $user;
    }

    public function show(Request $request) 
    {
        $user = User::find($request->id);

        return view('user', compact('user'));
    }
}
