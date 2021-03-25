<?php

namespace App\Http\Controllers;

use App\ConquerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConquerAuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:conquer')->except('logout');
    }

    public function login()
    {
        $routeActionName = $this->camelToUnderscore(explode("@", Route::getCurrentRoute()->getActionName())[1]);
        $view_to_show = 'themes.' . getenv('THEME_SELECTED') . '.' . $routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function logout()
    {
        session()->remove("conquer_auth");
        return redirect()->to('home');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $cUser = ConquerUser::where('username', $request->input('username'))->where( 'password', $request->input('password' ))->first();
        if ($cUser) {
            session()->put("conquer_auth", $cUser->Username);
            return redirect()->to('home');
        }
        return Redirect::to("login")->withErrors('Oppes! You have entered invalid credentials');
    }

    public function guard(){
        return Auth::guard('conquer');
    }
}
