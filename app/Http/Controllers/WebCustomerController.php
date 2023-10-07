<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
    public function index(Request $request)
{
    if($request->has('search')){
        $data = Customer::where('namaCust', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = Customer::paginate(5); }
    return view('Customers', compact('data'));

    // if($request->has('search')){
    //     $data = Admin::where('username', 'LIKE', '%'.$request->search.'%')->paginate(5);
    // }else{
    // $data = Admin::paginate(5); }
    // return view('admin', compact('data'));
    
}
}
