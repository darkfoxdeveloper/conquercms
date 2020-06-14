<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Link;
use App\ConquerEntity;
use App\ConquerUser;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Pvtl\VoyagerPages\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $status = false;
        try {
            $status = fsockopen(getenv("STATUS_HOST"), getenv("STATUS_PORT"), $errno, $errstr, 30);
        } catch (Exception $e) {
        }
        $routeActionName = explode("@", Route::getCurrentRoute()->getActionName())[1];
        View::share('settings_controller', $this);
        View::share('server_status', $status);
        View::share('online_players', ConquerEntity::where('Online', '=', '1')->count());
        View::share('total_accounts', ConquerUser::all()->count());
        View::share('section', strtolower($routeActionName));
    }

    public function Home(Route $route)
    {
        $routeActionName = strtolower(explode("@", Route::getCurrentRoute()->getActionName())[1]);
        $view_to_show = 'themes.'.getenv('THEME_SELECTED').'.'.$routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function Register()
    {
        $routeActionName = strtolower(explode("@", Route::getCurrentRoute()->getActionName())[1]);
        $view_to_show = 'themes.'.getenv('THEME_SELECTED').'.'.$routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function Downloads()
    {
        $routeActionName = strtolower(explode("@", Route::getCurrentRoute()->getActionName())[1]);
        $view_to_show = 'themes.'.getenv('THEME_SELECTED').'.'.$routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function Shop()
    {
        $routeActionName = strtolower(explode("@", Route::getCurrentRoute()->getActionName())[1]);
        $view_to_show = 'themes.'.getenv('THEME_SELECTED').'.'.$routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function PostRegister(Request $request)
    {
        $data = $request->all();
        $arr = array_merge($data, array("question" => "", "answer" => "", "mobilenumber" => "", "secretquestion" => ""));
        $cu = ConquerUser::create($arr);
        if($cu != null) {
            Session::flash('message', 'Account has been created succesfully.');
            Session::flash('message_type', 'success');
            return redirect()->back();
        } else {
            Session::flash('message', 'Cannot create the account.');
            Session::flash('message_type', 'danger');
            return redirect()->back();
        }
    }

    public function GetSetting($key, $default_value = null) {
        $value = $default_value;
        if (strlen($default_value) <= 0) {
            $value = $key;
        }
        $config = Configuration::where('key', '=', $key)->first();
        if ($config) {
            $value = $config->value;
        }
        return $value;
    }

    public function GetFooterLinks() {
        $links = Link::all();
        return $links;
    }

    public function GetPageContent() {
        $routeActionName = explode("@", Route::getCurrentRoute()->getActionName())[1];
        return Page::where('title', '=', 'Partial'.$routeActionName)->where('status', '=', 1)->first(); // Get a partial from pages where title = Partial+ControllerActionName
    }
}
