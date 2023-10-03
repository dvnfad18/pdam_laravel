<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class WebAdminController extends Controller
{

public function index()
{
    $data = Admin::all();
    return view('admin', compact('data'));
    
}
}

