<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::all();
        return view("worker.index")->with("workers",$workers);
    }

    public function add()
    {
        return view("worker.add");
    }

    public function update($id)
    {error_log($id.toString());
        return redirect(route("worker.index"));
    }

    public function worker_mod()
    {
        return 0;
    }
}

