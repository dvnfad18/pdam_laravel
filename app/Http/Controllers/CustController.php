<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class CustController extends Controller
{
    public function index() 
    {
    $cust = Customer::all(); // Retrieve all posts
    return response()->json(['data' => $cust]);
    }

    public function store(Request $request)
    {
    
    $validatedData = Validator::make($request->all(),[
        'namaCust' => 'required|string',
        'no_telp' => 'required|string',
        'email_Cust' => 'required|email',
        'password_Cust' => 'required|string',
        'alamat' => 'required|string'
    ]);
    
    if($validatedData->fails()){
        return response()->json([
            'success'=>false,
            'messages'=>'Ada Kesalahan',
            'data'=>$validatedData->errors()
        ]);
    }

    $cust = $request->all();
    $cust['password_Cust'] = bcrypt($cust['password_Cust']);
    $user = Customer::create($cust);

    $success['token']=$user->createToken('auth_token')->plainTextToken;
    // $success['namaCust']=$user->name;

    return response()->json([
        'success'=>true,
        'message' => 'Customer created successfully', 
        'data' => $cust, $success
    ], 
        201);
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

    public function login(Request $request)
    {
        $user = Customer::where('email_Cust', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password_Cust)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'message' => 'Berhasil Login'
        ], 200);
    }

}
