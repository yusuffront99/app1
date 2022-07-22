<?php

namespace App\Http\Controllers\Home;

use HTML;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    
            if ($request->ajax()) {
                $model = Laporan::with('users');
                    return DataTables::of($model)
                    ->addColumn('users', function (laporan $laporan) {
                        return $laporan->users->username;
                    })
                    
                    ->make();
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
        return view('pages.Laporan.create');
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
            "summary" => "required|max:255",
            "info" => 'required',
        ]);

        // $user->save();
        // $laporan = new Laporan;

        // $laporan->user_id = $request['user_id'];
        // $laporan->summary = $request['summary'];
        // $laporan->info = $request['info'];
        // $laporan->status = 'menunggu';
        
        // $laporan->save();

        Laporan::updateOrCreate(
            ['id' => $request->id],
            [
                'user_id' => $request->user_id,
                'summary' => $request->summary,
                'info' => $request->info,
                'status' => $request->status,
        
            ]);

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
        $laporan = Laporan::find($id);
        return response()->json($laporan);
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
        // $laporan = Laporan::find($id);
        // $laporan->summary = $request('summary');
        // $laporan->info = request('info');
        // $laporan->status = request('status');
        
        // $laporan->save();

        // return response()->json([
        //     'success' => 'Added Data Successfully'
        // ], 200);
        
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
