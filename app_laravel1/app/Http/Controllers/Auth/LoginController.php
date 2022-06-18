<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_auth(Request $request){
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
                return response()->json(['success' => 'Successfully Logged In']);
 
        } else {
            return response()->json(['warning'=> 'Something went wrong']);
        }
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
