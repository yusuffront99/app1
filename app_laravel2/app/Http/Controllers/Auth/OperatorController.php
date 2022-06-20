<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    public function index()
    {
        return view('pages.admin.operators.operator');
    }

    public function create_operator(Request $request)
    {
        // $validate_data = $request->validate([
        //     "nama_lengkap" => "required|max:255",
        //     "nip" => "required",
        //     "email" => 'required|email|unique:users,email',
        //     "password" => 'required'
        // ]);

        // User::updateOrCreate($validate_data);

        // return response()->json([
        //     'success' => 'Added Data Successfully'
        // ], 200);

        $user = User::where('email', $request['email'])->first();
        
        if($user) {
            return response()->json(['error' => 'Email Already Exists']);
        } else {
            $user = new User;
            $user->nama_lengkap = $request['nama_lengkap'];
            $user->nip = $request['nip'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        return response()->json(['success' => 'User Registered Successfully']);
    }
}
