<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $users = User::all();
        return view('auth.login', compact(['users']));
    }

    public function postlogin(Request $request)
    {
        $users = User::all();
        if (Auth::attempt($request->only('nip', 'password', 'role'))) {
            return view('role.dashboard');
        }

        return redirect('/login');
    }
}
