<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConquerAuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:conquer')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        // need change current encription to md5
        if ($this->guard()->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function guard(){
        return Auth::guard('conquer');
    }
}
