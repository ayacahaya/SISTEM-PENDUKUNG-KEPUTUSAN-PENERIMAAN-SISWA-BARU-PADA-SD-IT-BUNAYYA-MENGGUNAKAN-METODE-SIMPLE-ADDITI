<?php

namespace App\Http\Controllers;

use App\kriteria;
use App\subkriteria;
use Illuminate\Http\Request;
use DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = kriteria::all();
        $subkriteria = subkriteria::all();
        return view('admin.kriteria.index',compact('kriteria','subkriteria'));
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
        $this->validate($request, [
          'kriteria' => 'required|unique:kriteria,kriteria',
          'bobot' => 'required|numeric|between:0.00,0.99'
        ]);
        $bobot = $request->bobot;
        $sum = kriteria::all()->sum('bobot');
        if ($sum + $bobot <= 1) {
          kriteria::create([
            'kriteria' => $request->kriteria,
            'bobot' => $bobot,
            'tipe' => $request->tipe
          ]);
          return redirect(route('kriteria.index'))->with('Success','Data Berhasil Diinput !');
        }
        else {
        return redirect(route('kriteria.index'))->with('Cancled','Total Bobot Melebihi 1. Data Gagal Diinput !');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kriteria = kriteria::findorfail($id);
      $this->validate($request, [
        // 'kriteria' => 'required|unique:kriteria,kriteria',
        'bobot' => 'required|numeric|between:0.00,0.99'
      ]);
      $bobot = $request->bobot;
      $sum = kriteria::all()->sum('bobot');
      if ($sum <= 1) {
        kriteria::find($id)->update([
          'kriteria' => $request->kriteria,
          'bobot' => $bobot,
          // 'tipe' => $request->tipe
        ]);
        return redirect(route('kriteria.index'))->with('Updated','Data Berhasil Diperbarui !');
      }
      else{
        return redirect(route('kriteria.index'))->with('Cancled','Total Bobot Melebihi 1. Data Gagal Diinput !');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kriteria = kriteria::findorfail($id);
      DB::table("kriteria")->where("id", $id)->delete();
      DB::table("subkriteria")->where("kriteria_id", $id)->delete();
      return redirect(route('kriteria.index'))->with('Deleted','Data Telah Dihapus !');
    }
}
