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

    public function getUserById(Request $request)
    {
        $idCustomer = $request->input('idCust');
    
        $customer = DB::table('customers')
            ->where('idCust', $idCustomer)
            ->first();
    
        if ($customer) {
            $response = array(
                'idCust' => $customer->idCust,
                'namaCust' => $customer->namaCust,
                'email_Cust' => $customer->email_Cust,
                'no_telp' => $customer->no_telp,
                'alamat' => $customer->alamat,
                'gambar' => $customer->gambar
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'User not found',
                'data' => null
            );
        }
    
        return response()->json($response);
    }

    public function updateProfile(Request $request)
    {
        $idCustomer = $request->input('idCust');
        $profileImage = $request->file('gambar');
    
        // Validasi jika gambar profil ada
        if ($request->hasFile('gambar')) {
            $destinationPath = 'images/';
            $profileImageName = date('YmdHis') . "." . $profileImage->getClientOriginalExtension();
            $profileImage->move($destinationPath, $profileImageName);
            $profileImageUrl = "images/" . $profileImageName;
    
            // Update profil pengguna dengan gambar profil baru
            $updateProfile = DB::table('customers')
                ->where('idCust', $idCustomer)
                ->update([
                    'gambar' => $profileImageUrl
                ]);
    
            if ($updateProfile) {
                $response = array(
                
                        'idCust' => $idCustomer,
                        'gambar' => $profileImageUrl
                   
                );
                return response()->json($response);
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to update profile',
                );
                return response()->json($response);
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'No profile image found',
            );
            return response()->json($response);
        }
    }

}
