<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $query = User::with('role');

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
        return redirect()->route('user.index')->with('success','User Berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request,User $user)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.index')->with('success','User Berhasil diupdate!');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

}
