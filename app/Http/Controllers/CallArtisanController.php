<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class CallArtisanController extends Controller
{
    //
    public function clear() {
        $user = request("user");
        $pw = request("pw");
        if ($user=="ben"&&$pw=="benjamin12"){
            $clearcache = Artisan::call('cache:clear');
            echo "Cache cleared<br>";

            $clearview = Artisan::call('view:clear');
            echo "View cleared<br>";

            $clearconfig = Artisan::call('config:cache');
            echo "Config cleared<br>";
        }
        else{
            return "fail";
        }

    }
    public function migrate(){
        $user = request("user");
        $pw = request("pw");
        if ($user=="ben"&&$pw=="benjamin12"){
            $clearcache = Artisan::call('migrate');
            echo "migrated<br>";
        }
        return "fail";
    }
}
