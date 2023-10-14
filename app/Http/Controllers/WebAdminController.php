<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebAdminController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.admins');
    }
public function index(Request $request)
{
    if($request->has('search')){
        $data = User::where('username', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = User::paginate(5); }
    return view('admin', compact('data'));
    
}
public function tambah()
{
    return view('admintambah');
}

public function insert(Request $request)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'noTelp' => 'required',
    ]);

    $validatedData['name'] = $request->name;
    $validatedData['username'] = $request->username;
    $validatedData['password'] =Hash::make($request->password);
    $validatedData['noTelp'] = $request->noTelp;

    User::create($validatedData); 
    return redirect()->route('admin.admins')->with('success','Data Berhasil Ditambahkan');
}

public function tampil($idAdmin)
{
   $data = User::find($idAdmin);
   return view('admintampildata', compact('data'));

}

public function update(Request $request, $idAdmin)
{
   $data = User::find($idAdmin);
   $data->update($request->all());
   return redirect()->route('admin.admins')->with('success','Data Berhasil Di Update');

}

public function delete($idAdmin)
{
   $data = User::find($idAdmin);
   $data->delete();
   return redirect()->route('admin.admins')->with('success','Data Berhasil Di  Hapus');
}
}


  