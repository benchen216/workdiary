<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class WorkerController extends Controller
{
    public function index()
    {
        return view("worker.index");
    }

    public function add()
    {
        return view("worker.add");
    }

    public function save()
    {
        return redirect("worker.index");
    }

    public function worker_mod()
    {
        return 0;
    }
}

