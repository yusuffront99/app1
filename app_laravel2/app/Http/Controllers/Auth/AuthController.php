<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('pages.admin.dashboard');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_lengkap" => "required|max:255",
            "nip" => "required",
            "email" => 'required|email|unique:users,email',
            "password" => 'required',
        ]);

        $user = User::where('email', $request['email'])->first();
        
        if($user) {
            return response()->json(['error' => 'Email Already Exists']);
        } else {
            $user = new User;
            
            $user->nama_lengkap = $request['nama_lengkap'];
            $user->nip = $request['nip'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->tanggal_lahir = $request['tanggal_lahir'];
            $user->jabatan = $request['jabatan'];
            $user->grade = $request['grade'];
        }

        $user->save();
        
        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.operators.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
