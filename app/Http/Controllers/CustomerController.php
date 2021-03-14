<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view("customer.index",['customer' => $customer]);
    }

    public function store(){

    }

    public function destroy($id){

    }
}
