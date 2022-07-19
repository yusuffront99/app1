<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
                return response()->json(['success' => true], 200);
        } else {
                return response()->json(['warning'=> 'Something went wrong']);
        }  
    }

    public function register()
    {
        return view('register');
    }

    public function register_store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|max:255",
            "email" => 'required|email|unique:users,email',
            "password" => 'required',
        ]);

        $user = User::where('email', $request['email'])->first();
        
        if($user) {
            return response()->json(['error' => 'Email Already Exists']);
        } else {
            $user = new User;
            
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        
        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }
}
