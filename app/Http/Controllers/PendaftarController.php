<?php

namespace App\Http\Controllers;

use App\pendaftar;
use Illuminate\Http\Request;
use App\user;
use App\kriteria;
use App\biodata;
use App\subkriteria;
use App\normalisasi;
use DB;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
        $kriteria = kriteria::all();
        $subkriteria = subkriteria::all();
        $biodata = biodata::all();
        return view('admin.pendaftar.index', compact('user','subkriteria','kriteria','biodata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = user::findorfail($id);
      user::find($id)->update([
        'status' =>$request->status
      ]);
      if (count($request->kriteria_id) > 0) {
        foreach ($request->kriteria_id as $key => $value) {
          $data = array(
            'user_id' => $request->user_id[$key],
            'kriteria_id' => $request->kriteria_id[$key],
            'subkriteria_id' => $request->subkriteria_id[$key],
          );
          normalisasi::insert($data);
        }
        return redirect(route('pendaftar.index'))->with('Success','Data Berhasil Diinput!');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendaftar $pendaftar)
    {
        //
    }
}
