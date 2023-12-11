<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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

public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_Cust' => 'required|email|unique:customers,email_Cust',
            'password_Cust' => 'required|min:6',
            'namaCust' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        
        // Validasi jika email sudah terdaftar sebelumnya
        $existingCustomer = Customer::where('email_Cust', $email_Cust)->first();

        if ($existingCustomer) {
            $response = [
                'success' => false,
                'message' => 'Email already registered',
            ];
            return response()->json($response);
        }

        // Menggunakan model Eloquent untuk menyimpan data
        $customer = Customer::create([
            'email_Cust' => $email_Cust,
            'password_Cust' => $password_Cust,
            'namaCust' => $namaCust,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
        ]);

        if ($customer) {
            $response = [
                'success' => true,
                'message' => 'Registration successful',
                'data' => $customer,
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Registration failed',
            ];
            return response()->json($response);
        }
            
                // Lakukan proses penyimpanan data customer ke database
            
                $customer = DB::table('customers')->insertGetId([
                    'email_Cust' => $email_Cust,
                    'password_Cust' => $password_Cust,
                    'namaCust' => $namaCust,
                    'no_telp' => $no_telp,
                    'alamat' => $alamat
                ]);
                if ($customer) {
                    $response = array(
                        'success' => true,
                        'message' => 'Registration successful',
                        'data' => array(
                            'idCust' => $customer,
                            'namaCust' => $namaCust,
                            'email_Cust' => $email_Cust,
                            'no_telp' => $no_telp,
                            'alamat' => $alamat
                        )
                    );
                    return response()->json($response);
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Registration failed',
                    );
                    return response()->json($response);
                }
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
    $idCust = $request->input('idCust');

    $customer = Customer::find($idCust);

    if ($customer) {
        $response = [
            'idCust' => $customer->idCust,
            'namaCust' => $customer->namaCust,
            'email_Cust' => $customer->email_Cust,
            'no_telp' => $customer->no_telp,
            'alamat' => $customer->alamat,
            'gambar' => $customer->gambar
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];
    }

    return response()->json($response);
}

    public function updateProfile(Request $request)
    {
        $idCust = $request->input('idCust');
        $profileImage = $request->file('gambar');
    
        // Validasi jika gambar profil ada
        if ($request->hasFile('gambar')) {
            $destinationPath = 'images/';
            $profileImageName = date('YmdHis') . "." . $profileImage->getClientOriginalExtension();
            $profileImage->move($destinationPath, $profileImageName);
            $profileImageUrl = "images/" . $profileImageName;
    
            // Update profil pengguna dengan gambar profil baru
            $updateProfile = DB::table('customers')
                ->where('idCust', $idCust)
                ->update([
                    'gambar' => $profileImageUrl
                ]);
    
            if ($updateProfile) {
                $response = array(
                
                        'idCust' => $idCust,
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
