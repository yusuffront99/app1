<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
            $data = Laporan::with('users');

            return DataTables::of($data)
            ->addColumn('users', function (laporan $laporan) {
                return $laporan->users->username;
            })
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-id="'.$data->id.'"class="badge bg-primary check-data">Check</a>'; 
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }

        return view('pages.supervisor.index');
    }


    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return response()->json($laporan);
    }
}
