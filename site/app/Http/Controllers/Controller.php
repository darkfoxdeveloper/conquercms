<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Link;
use App\ConquerEntity;
use App\ConquerUser;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use Jackiedo\DotenvEditor\DotenvEditor;
use Pvtl\VoyagerPages\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if (!isset($_COOKIE["SetupStart"])) {
            $path = base_path(). DIRECTORY_SEPARATOR . '.env';
            if(file_exists($path)) {
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
            } else {
                file_put_contents($path, file_get_contents($path.".example")); // Generate a .env
                setcookie("SetupStart", true, time() + 3600, "/");
                die("<h1>All ready. Please reload the page for start setup...</h1>");
            }
        }
    }

    public function Home(Route $route)
    {
        if (isset($_COOKIE["SetupStart"])) {
            return view('layouts.setup');
        }
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
        $exist = ConquerUser::where('username', '=', $data["username"])->count() > 0;
        if(!$exist) {
            //$arr = array_merge($data, array("question" => "", "answer" => "", "mobilenumber" => "", "secretquestion" => ""));
            $arr = $data;
            $cu = ConquerUser::create($arr);
            if($cu != null) {
                return redirect()->route('register')->with('success', __('register.register_success'));
            } else {
                return redirect()->route('register')->with('danger', __('register.register_fail'));
            }
        } else {
            return redirect()->route('register')->with('warning', __('register.register_already_exists'));
        }
    }

    public function PostSetup(Request $request)
    {
        $envEditor = new DotenvEditor(app(), config());
        $envEditor->setKeys(array(
            "CONQUER_DB_HOST" => $request->get('cqDatabaseHost'),
            "CONQUER_DB_PORT" => $request->get('cqDatabasePort'),
            "CONQUER_DB_DATABASE" => $request->get('cqDatabaseName'),
            "CONQUER_DB_USERNAME" => $request->get('cqDatabaseUsername'),
            "CONQUER_DB_PASSWORD" => $request->get('cqDatabasePassword'),
            "DB_DATABASE" => $request->get('cmsDatabaseName'),
            "DB_USERNAME" => $request->get('cqDatabaseUsername'),
            "DB_PASSWORD" => $request->get('cqDatabasePassword')
        ));
        $envEditor->save();
        setcookie("SetupStart", true, time() - 3600, "/");
        Artisan::call('cache:clear');
        Artisan::call('migrate');
        return redirect()->route('home')->with('success', __('general.setup_success'))->with('migrate', true);
    }

    public function GetFooterLinks() {
        return array();// TODO get from voyager settings
    }
}
