<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Link;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Pvtl\VoyagerPages\Page;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $status = false;
        try {
            $configs = Configuration::all();
            $status = fsockopen($configs->where('key', '=', 'host')->first(), $configs->where('key', '=', 'game_port')->first(), $errno, $errstr, 30);
        } catch (Exception $e) {
        }
        View::share('settings_controller', $this);
        View::share('server_status', $status);
    }

    public function Home()
    {
        return view('base-for-themes');
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
        return Page::where('title', '=', 'Home - Events')->first();
    }
}
