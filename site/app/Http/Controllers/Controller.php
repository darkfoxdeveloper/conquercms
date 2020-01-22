<?php

namespace App\Http\Controllers;

use App\Configuration;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Home()
    {
        $config = Configuration::first();
        if ($config === null) {
            die("Error. Not exist configuration for use.");
        }
        try {
            $config->server_online = fsockopen($config->host, $config->game_port, $errno, $errstr, 30);
        } catch (Exception $e) {
            $config->server_online = false;
        }
        return view('base-for-themes', array("config" => $config));
    }
}
