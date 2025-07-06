<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $query = User::query();

        if(request()->has('search')){
            $query->where('email','like','%' . request()->get('search','') . '%')->orWhere('name','like','%' . request()->get('search','') . '%');
        }

        $users=$query->paginate(5);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8'
        ]);

        $users = User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('suscces','User Berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request,User $user)
    {
        /* $request->validate([ */
        /*     'name'=>'required|string|max:255', */
        /*     'email'=>'required|string|email|max:255|unique:users,email', */
        /*     'password'=>'required|string|min:8' */
        /* ]); */
        if ($request->filled('email')) {
            $request->validate(['email'=>'string|email|max:255|unique:users,email'.$user->email]);
        }
        if ($request->filled('name')) {
            $request->validate(['name'=>'string|max:255']);
        }
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:8']);
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return redirect()->route('user.index')->with('suscces','User Berhasil diupdate!');

    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

}
