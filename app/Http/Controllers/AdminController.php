<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use HttpResponses;
    public function login(LoginAdminRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only(['name', 'password']))) {
            return  $this->error('', 'Crendentials Do not Match', 401);
        }
        $admin = Admin::where('name', $request->name)->first();
        return $this->success([
            'Admin' => $admin,
            'token' => $admin->createToken('Api Token Of ' . $admin->name)->plainTextToken
        ]);
    }

    public function register(StoreAdminRequest $request)
    {
        $role = Auth::user() -> role;
        if($role != 'ceo'){
            return $this -> error([
                'message' => 'You are Not Allow TO do that'
            ]);
        }
        $request->validated($request->all());
        $Admin = Admin::create([
            'name' => $request->name,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return $this->success([
            'admin' => $Admin,
        ]);
    }

    public function logout()
    {
        Auth::user() -> currentAccessToken() -> delete();
        return $this -> success([
            'Message' => "You Successfuly Logedout"
        ]);
        return response()->json('logout');
    }
}
