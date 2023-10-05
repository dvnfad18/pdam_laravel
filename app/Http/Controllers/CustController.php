<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustController extends Controller
{
    public function index() 
    {
    $cust = Customer::all(); // Retrieve all posts
    return response()->json(['data' => $cust]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'namaCust' => 'required|string',
        'no_telp' => 'required|string',
        'email_Cust' => 'required|string',
        'password_Cust' => 'required|string',
        'alamat' => 'required|string'
    ]);

    $cust = Customer::create($validatedData);

    return response()->json(['message' => 'Customer created successfully', 'data' => $cust], 201);
    }   

    public function update(Request $request, $idCustomer)
{
    $cust = Customer::find($idCustomer);

    if (!$cust) {
        return response()->json(['message' => 'Customer not found'], 404);
    }

    $validatedData = $request->validate([
        'namaCust' => 'string',
        'no_telp' => 'string',
        'email_Cust' => 'string',
        'password_Cust' => 'string',
        'alamat' => 'string'
    ]);

    $cust->update($validatedData);

    return response()->json(['message' => 'Customer updated successfully', 'data' => $cust]);
}

public function destroy($idCustomer)
{
    $cust = Customer::find($idCustomer);

    if (!$cust) {
        return response()->json(['message' => 'Customer not found'], 404);
    }else{
        return response()->json(['message' => 'Customer deleted'], 201);
    }

    $cust->delete();

}
}
