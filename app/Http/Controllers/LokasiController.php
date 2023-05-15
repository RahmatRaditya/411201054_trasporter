<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Lokasi;

class LokasiController extends Controller
{
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