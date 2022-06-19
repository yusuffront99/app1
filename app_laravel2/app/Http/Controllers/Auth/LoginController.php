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

    public function auth_login(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'max:255|email|required',
        //     'password' => 'required'
        // ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
                return response()->json(['success' => true], 200);
        } else {
                return response()->json(['warning'=> 'Something went wrong']);
        }
    }

    public function auth_logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
