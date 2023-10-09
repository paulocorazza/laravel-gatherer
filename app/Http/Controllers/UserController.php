<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return to_route('cards.index');
        }
        return view('auth.index');
    }

    public function store(Request $request)
    {
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->back()->withErrors(['password or email are invalid.']);
        }
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data  = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return to_route('cards.index');

    }
}
