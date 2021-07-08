<?php

namespace App\Http\Controllers;

use App\normalisasi;
use App\kriteria;
use App\subkriteria;
use App\user;
use Illuminate\Http\Request;
use DB;

class NormalisasiController extends Controller
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
        return view('admin.normalisasi.index', compact('normalisasi','kriteria','subkriteria','user'));
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
      if (count($request->kriteria_id) > 0) {
        foreach ($request->kriteria_id as $key => $value) {
          $data = array(
            'pendaftar_id' => $request->pendaftar_id[$key],
            'kriteria_id' => $request->kriteria_id[$key],
            'subkriteria_id' => $request->subkriteria_id[$key],
          );
          normalisasi::insert($data);
        }
        return redirect(route('pendaftar.index'))->with('Success','Data Berhasil Diinput!');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function show(normalisasi $normalisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(normalisasi $normalisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = '';
        $user = user::findorfail($id);
        user::find($id)->update([
          'status' => $status
        ]);
        DB::table("normalisasi")->where("user_id", $id)->delete();
        return redirect(route('normalisasi.index'))->with('Deleted','Data Telah Dihapus !');
    }
}
