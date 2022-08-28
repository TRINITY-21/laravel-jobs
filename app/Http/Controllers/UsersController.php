<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {

        return view('users.register');
    }

    public function register(Request $req)
    {
        $formsFields = $req->validate([
            'name' => 'required',
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3'
        ]);

        // hash password
        $formsFields['password'] = bcrypt($formsFields['password']);

        $user = User::create($formsFields);

        auth()->login($user);

        return redirect('/')->with('success', $user->name . ' registered success');
    }

    public function login()
    {
        return view('users.login');
    }

    public function loginUser(Request $req)
    {

        $formsFields = $req->validate([
            'email' => 'email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formsFields)) {
            $req->session()->regenerate();

            return redirect('/')->with('sucess', 'login sucess');
        }
    }

    public function logOut(Request $req)
    {
        auth()->logout();

        $req->session()->regenerateToken();
        $req->session()->invalidate();

        return redirect('/')->with('success', 'log out success');
    }
}