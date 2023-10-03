<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
    public function index()
{
    $data = Customer::all();
    return view('Customers', compact('data'));
    
}
}
