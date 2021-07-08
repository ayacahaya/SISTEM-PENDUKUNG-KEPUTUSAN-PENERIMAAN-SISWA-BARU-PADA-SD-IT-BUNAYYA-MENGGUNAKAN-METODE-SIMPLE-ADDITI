<?php

namespace App\Http\Controllers;

use App\biodata;
use App\user;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = biodata::all();
        $user = user::all();
        return view('user.biodata.index', compact('biodata','user'));
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
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $biodata = biodata::findorfail($id);
        biodata::find($id)->update([
          'umur' => $request->umur,
          'jns_kelamin' => $request->jns_kelamin,
          'alamat' => $request->alamat,
          'tmp_lahir' => $request->tmp_lahir,
          'tgl_lahir' => $request->tgl_lahir,
          'kecamatan' => $request->kecamatan,
          'kabupaten' => $request->kabupaten,
          'nama_ayah' => $request->nama_ayah,
          'nama_ibu' => $request->nama_ibu,
          'no_hp' => $request->no_hp,
          'pekerjaan_ortu' => $request->pekerjaan_ortu
        ]);
        return redirect(route('biodata.index'))->with('Updated','Data Berhasil Diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(biodata $biodata)
    {
        //
    }
}
