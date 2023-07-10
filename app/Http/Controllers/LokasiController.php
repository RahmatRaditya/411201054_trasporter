<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Lokasi;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::orderBy('created_at', 'desc')->get();
        return view('lokasi_list', ['lokasi' => $lokasi]);
    }

    public function create()
    {
        return view('lokasi_form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required',
        ]);

        Lokasi::create([
            'kode_lokasi' => e($request->input('kode_lokasi')),
            'nama_lokasi' => e($request->input('nama_lokasi')),
        ]);
        return redirect()->route('lokasi.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);
        return view('lokasi_edit', ['lokasi' => $lokasi]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required',
        ]);

        $lokasi = Lokasi::find($id);
        $lokasi->kode_lokasi = e($request->input('kode_lokasi'));
        $lokasi->nama_lokasi = e($request->input('nama_lokasi'));
        $lokasi->save();

        return redirect()->route('lokasi.index');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index');
    }



    //=================================================
    //Rest API

    public function getLokasi()
    {
        $lokasi = Lokasi::orderBy("id", "desc")->get();
        return Helper::toJson($lokasi);
    }

    public function createLokasi(Request $request)
    {

        $lokasi = new Lokasi();
        $lokasi->kode_lokasi = $request->kode_lokasi;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();

        return Helper::toJson($lokasi, "Data lokasi sudah ditambah");

    }

    public function updateLokasi(Request $request)
    {

        $lokasi = Lokasi::where("id", $request->id)->first();
        $lokasi->kode_lokasi = $request->kode_lokasi;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();

        return Helper::toJson($lokasi, "Data lokasi sudah diubah");

    }

    public function deleteLokasi($id)
    {

        $lokasi = Lokasi::where('id', $id)->first();
        Lokasi::where('id', $id)->delete();

        return Helper::toJson("", "Data lokasi sudah dihapus");

    }
}