<?php

namespace App\Http\Controllers;

use App\ConquerEntity;
use App\ConquerUser;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Jackiedo\DotenvEditor\DotenvEditor;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if (!isset($_COOKIE["SetupStart"])) {
            $path = base_path() . DIRECTORY_SEPARATOR . '.env';
            if (file_exists($path)) {
                $status = false;
                try {
                    $status = fsockopen(getenv("STATUS_HOST"), getenv("STATUS_PORT"), $errno, $errstr, 30);
                } catch (Exception $e) {
                }
                $routeActionName = $this->camelToUnderscore($this->camelToUnderscore(Route::getCurrentRoute()->uri()));
                View::share('settings_controller', $this);
                View::share('server_status', $status);
                try {
                    View::share('online_players', ConquerEntity::where('Online', '=', '1')->count());
                } catch (Exception $exception) {
                    // Detected error with this query, try with query for WorldConquer source
                    try {
                        View::share('online_players', ConquerEntity::whereColumn('last_login', '=', 'last_logout')->count());
                    } catch (Exception $exception) {}
                }
                View::share('total_accounts', ConquerUser::all()->count());
                View::share('section', $routeActionName);
            } else {
                $routeActionName = $this->camelToUnderscore($this->camelToUnderscore(Route::getCurrentRoute()->uri()));
                if ($routeActionName == "/") {
                    die(header("Location: /setup"));
                }
            }
        }
    }

    public function Setup()
    {
        $view_to_show = 'themes.' . getenv('THEME_SELECTED') . '.setup';
        return view($view_to_show);
    }

    public function Action()
    {
        $routeActionName = $this->camelToUnderscore($this->camelToUnderscore(Route::getCurrentRoute()->uri()));
        if ($routeActionName == "/") {
            $routeActionName = "home";
        }
        if (session("conquer_auth")) {
            $cUser = ConquerUser::where(env("CONQUER_DB_ACCOUNT_USERNAME_COL"), session("conquer_auth"))->first();
            Auth::guard("conquer")->login($cUser);
            View::share('conquer_auth', $cUser);
        } else {
            View::share('conquer_auth', false);
        }
        $view_to_show = 'themes.' . getenv('THEME_SELECTED') . '.' . $routeActionName;
        if (!view()->exists($view_to_show)) {
            return view('layouts.404');
        }
        return view($view_to_show);
    }

    public function Ranking()
    {
        $players = [];
        foreach(ConquerEntity::orderByDesc(env("CONQUER_DB_ENTITY_LEVEL_COL"))->orderByDesc(env("CONQUER_DB_ENTITY_REBORN_COL"))->limit(100)->get() as $player) {
            array_push($players, $player);
        }
        return $this->Action()->with('ranking_players', $players);
    }

    public function ChangePassword()
    {
        if (session("conquer_auth")) {
            return $this->Action();
        }
        return redirect()->route('home')->with('error', __('general.no_permission'));
    }

    public function PostRegister(Request $request)
    {
        if (session("conquer_auth")) {
            $cUser = ConquerUser::where(env("CONQUER_DB_ACCOUNT_USERNAME_COL"), session("conquer_auth"))->first();
            Auth::guard("conquer")->login($cUser);
            View::share('conquer_auth', $cUser);
        } else {
            View::share('conquer_auth', false);
        }
        $data = $request->all();
        if (strlen(env("CONQUER_DB_ACCOUNT_EMAIL_COL")) <= 0) {
            unset($data["email"]);
        }
        $exist = ConquerUser::where(env("CONQUER_DB_ACCOUNT_USERNAME_COL"), '=', $data["username"])->count() > 0;
        if (!$exist) {
            //$arr = array_merge($data, array("question" => "", "answer" => "", "mobilenumber" => "", "secretquestion" => ""));
            $arr = $data;
            $cu = ConquerUser::create($arr);
            if ($cu != null) {
                return redirect()->route('register')->with('success', __('register.register_success'));
            } else {
                return redirect()->route('register')->with('error', __('register.register_fail'));
            }
        } else {
            return redirect()->route('register')->with('warning', __('register.register_already_exists'));
        }
    }

    public function PostChangePassword(Request $request)
    {
        if (session("conquer_auth")) {
            $cUser = ConquerUser::where(env("CONQUER_DB_ACCOUNT_USERNAME_COL"), session("conquer_auth"))->first();
            Auth::guard("conquer")->login($cUser);
            View::share('conquer_auth', $cUser);
        } else {
            View::share('conquer_auth', false);
        }
        $data = $request->all();
        $use_email = getenv("CONQUER_DB_ACCOUNT_EMAIL_COL") && strlen(getenv("CONQUER_DB_ACCOUNT_EMAIL_COL")) > 0;
        $userCol = env("CONQUER_DB_ACCOUNT_USERNAME_COL");
        $passEncryption = env("CONQUER_DB_ACCOUNT_PASSWORD_ENCRYPTION");
        $passwordCheck = $data["password"];
        if ($passEncryption != "textplain") {
            $passwordCheck = hash($passEncryption, $data["password"].$cUser->Salt);
        }
        if (!$use_email) {
            unset($data["email"]);
            $user = ConquerUser::where($userCol, '=', $cUser->{$userCol})->where('password', $passwordCheck);
        } else {
            $user = ConquerUser::where(env("CONQUER_DB_ACCOUNT_USERNAME_COL"), '=', $cUser->{env("CONQUER_DB_ACCOUNT_USERNAME_COL")})->where('password', $passwordCheck)->where('email', $data["email"]);
        }
        if ($user->count() > 0) {
            if ($data["new-password"] && strlen($data["new-password"]) >= 6) {
                if (getenv("CONQUER_DB_ACCOUNT_PASSWORD_ENCRYPTION") && strlen(getenv("CONQUER_DB_ACCOUNT_PASSWORD_ENCRYPTION")) > 0) {
                    $data["new-password"] = hash(getenv("CONQUER_DB_ACCOUNT_PASSWORD_ENCRYPTION"), $data["new-password"].$cUser->Salt);
                }
                if ($use_email) {
                    ConquerUser::where('email', $data['email'])->update(['password' => $data["new-password"]]);
                } else {
                    ConquerUser::where($userCol, $cUser->{$userCol})->update(['password' => $data["new-password"]]);
                }
                return redirect()->route('change-password')->with('success', __('change-password.success'));
            } else {
                return redirect()->route('change-password')->with('success', __('change-password.invalid_new_password'))->with('data', $data);
            }
        } else {
            return redirect()->route('change-password')->with('warning', __('change-password.invalid_data'))->with('data', $data);
        }
    }

    public function PostSetup(Request $request)
    {
        $path = base_path() . DIRECTORY_SEPARATOR . '.env';
        file_put_contents($path, file_get_contents($path . ".example")); // Generate a .env
        $envEditor = new DotenvEditor(app(), config());
        $envEditor->setKeys(array(
            "CONQUER_DB_HOST" => $request->get('cqDatabaseHost'),
            "CONQUER_DB_PORT" => $request->get('cqDatabasePort'),
            "CONQUER_DB_DATABASE" => $request->get('cqDatabaseName'),
            "CONQUER_DB_DATABASE_GAMESERVER" => $request->get('cqDatabaseName'),
            "CONQUER_DB_USERNAME" => $request->get('cqDatabaseUsername'),
            "CONQUER_DB_PASSWORD" => $request->get('cqDatabasePassword'),
            "DB_DATABASE" => $request->get('cmsDatabaseName'),
            "DB_USERNAME" => $request->get('cqDatabaseUsername'),
            "DB_PASSWORD" => $request->get('cqDatabasePassword')
        ));
        $envEditor->save();
        $conn = mysqli_connect($request->get('cqDatabaseHost'), $request->get('cqDatabaseUsername'), $request->get('cqDatabasePassword'));
        $charset = "utf8mb4";
        $collation = "utf8mb4_unicode_ci";
        $querySQL = "CREATE DATABASE IF NOT EXISTS ".$request->get('cmsDatabaseName')." CHARACTER SET $charset COLLATE $collation;";
        mysqli_query($conn, $querySQL);
        Artisan::call('migrate');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        setcookie("SetupStart", true, time() - 3600, "/");
        return redirect()->route('home')->with('success', __('general.setup_success'))->with('migrate', true);
    }

    public function VoteReward($username, $ip)
    {
        if (!isset($ip) || strlen($ip) <= 0):
            return abort(401);
        endif;
        $cEntity = ConquerEntity::where('Owner', '=', $username)->first();
        if ($cEntity) {
            $content = "Voted => " . $username . "\r\n";
            $valueToUpdate = $cEntity->ConquerPoints+=1000;
            ConquerEntity::where('Owner', '=', $username)->update(['ConquerPoints' => $valueToUpdate]);
        } else {
            $content = "Cannot get the entity of the username\r\n";
        }
        file_put_contents('last_vote_result.txt', $content);
    }

    public function camelToUnderscore($string, $us = "-")
    {
        return strtolower(preg_replace(
            '/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/', $us, $string));
    }
}
