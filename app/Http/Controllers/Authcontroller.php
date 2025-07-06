<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authcontroller extends Controller
{


    public function registerWeb(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
        $penggunaRoleId = Role::where('role_name', 'pengguna')->first()->id;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>$penggunaRoleId,
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil!');
    }

    public function loginWeb(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth('api')->attempt($credentials)) {
            return back()->withErrors(['email' => 'Email atau Password salah.'])->withInput();
        }

        return redirect()->intended('dashboard')->cookie(
            'token',
            $token,
            config('jwt.ttl'),
            '/',
            null,
            false,
            true,
            false,
            'lax'
        );
    }

    public function logoutWeb(Request $request)
    {
        try {
            auth('api')->logout();
        }
        catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

        }

        return redirect('/login')->withCookie(\Cookie::forget('token'));
    }


    public function loginApi()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function registerApi(Request $request) {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $penggunaRoleId = Role::where('role_name', 'pengguna')->first()->id;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>$penggunaRoleId,
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logoutApi()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
