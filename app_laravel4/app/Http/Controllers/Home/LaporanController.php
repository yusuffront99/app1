<?php

namespace App\Http\Controllers\Home;

use HTML;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $model = Laporan::with('user')->get();

        // if($request->ajax()) {
        //     return DataTables::of($model)
        //             ->addColumn('users', function (Laporan $laporan) {
        //                 return $laporan->user->username;
        //             })
        //             ->make();
        // }

    
            // return DataTables::of($query)
            // ->addColumn('users', function(Laporan $laporan){
            //     return $laporan->user->username;
            // })
            // ->make(true);

            if ($request->ajax()) {
                $model = Laporan::with('users');
                    return DataTables::eloquent($model)
                    ->addColumn('users', function (laporan $laporan) {
                        return $laporan->users->username;
                    })
                    ->toJson();
            }

        return view('pages.Laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
