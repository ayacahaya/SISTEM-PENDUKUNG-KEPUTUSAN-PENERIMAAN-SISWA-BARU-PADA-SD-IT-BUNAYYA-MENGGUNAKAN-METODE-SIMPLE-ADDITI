<?php

namespace App\Http\Controllers;

use App\normalisasi;
use App\kriteria;
use App\subkriteria;
use App\user;
use App\biodata;
use Illuminate\Http\Request;
use DB;
use PDF;

class hasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $normalisasi = normalisasi::all();
      $kriteria = kriteria::all();
      $subkriteria = subkriteria::all();
      $user = user::all();
      $biodata = biodata::all();
      return view('admin.hasil.index', compact('normalisasi','kriteria','subkriteria','user','biodata'));
    }

    public function cetak_pdf()
    {
      $normalisasi = normalisasi::all();
      $kriteria = kriteria::all();
      $subkriteria = subkriteria::all();
      $user = user::all();
      $biodata = biodata::all();
      $pdf = PDF::loadview('admin.hasil.hasil_pdf', compact('normalisasi','kriteria','subkriteria','user','biodata'));
      return $pdf->stream();
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
