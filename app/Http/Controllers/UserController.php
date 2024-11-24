<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('name')->get();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('12345678'),
        ]);

        if ($user){ //if success
            return redirect()->route('users.index')->with('success','User successfully added');
        }

        return redirect()->route('users.index')->with('error','Failed to add user');
    }

    public function update(StoreUserRequest $request, User $user)
    {

    
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->save()){
            return redirect()->route('users.index')->with('success','User successfully updated');
        }
        return redirect()->route('users.index')->with('error','Failed to update user');
    }

    public function destroy(User $user)
    {
        if ($user->delete()){ //forceDelete() utk permanently delete
            return redirect()->route('users.index')->with('success','Food successfully deleted');
        }
        return redirect()->route('users.index')->with('error','Failed to delete food');
    }
}
