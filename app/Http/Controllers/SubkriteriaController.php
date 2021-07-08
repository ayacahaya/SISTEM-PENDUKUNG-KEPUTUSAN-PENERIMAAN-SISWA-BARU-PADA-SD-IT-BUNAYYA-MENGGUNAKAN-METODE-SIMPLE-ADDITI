<?php

namespace App\Http\Controllers;

use App\subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        'bobot' => 'required|numeric|between:1,10'
      ]);
      $bobot = $request->bobot;
      if ($bobot <= 10) {
        subkriteria::create([
          'kriteria_id' => $request->kriteria_id,
          'subkriteria' => $request->subkriteria,
          'bobot' => $bobot
        ]);
        return redirect(route('kriteria.index'))->with('Success','Data Berhasil Diinput !');
      }
      else {
      return redirect(route('kriteria.index'))->with('Cancled','Bobot Melebihi 10. Data Gagal Diinput !');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(subkriteria $subkriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $subkriteria = subkriteria::findorfail($id);
      $this->validate($request, [
      ]);
      $bobot = $request->bobot;
      if ($bobot <= 10) {
        subkriteria::find($id)->update([
          'subkriteria' => $request->subkriteria,
          'bobot' => $bobot
        ]);
        return redirect(route('kriteria.index'))->with('Updated','Data Berhasil Diperbarui !');
      }
      else {
      return redirect(route('kriteria.index'))->with('Cancled','Bobot Melebihi 10. Data Gagal Diinput !');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subkriteria = subkriteria::findorfail($id);
      subkriteria::find($id)->delete();
      return redirect(route('kriteria.index'))->with('Deleted','Data Telah Dihapus !');
    }
}
