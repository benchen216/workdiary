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
        $myuser = new User;
        $myuser->name = request("name");
        $myuser->email = request("email");
        $myuser->password = Hash::make( request("password"));
        $myuser->save();
        return redirect(route("worker.index"));
    }

    public function update($id)
    {   error_log($id);
        $myuser = User::findOrFail($id);
        $myuser->is_job = request("is_job");
        $myuser->user_type = request("user_type");
        $myuser->save();
        return redirect(route("worker.index"));
    }
}

