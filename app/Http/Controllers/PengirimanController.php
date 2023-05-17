<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Pengiriman;

class PengirimanController extends Controller
{
    public function getPengiriman()
    {
        $pengiriman = Pengiriman::orderBy("id", "desc")->get();
        return Helper::toJson($pengiriman);
    }

    public function createPengiriman(Request $request)
    {

        $pengiriman = new Pengiriman();
        $pengiriman->no_pengiriman = $request->no_pengiriman;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_id = $request->lokasi_id;
        $pengiriman->barang_id = $request->barang_id;
        $pengiriman->jumlah_barang = $request->jumlah_barang;
        $pengiriman->harga_barang = $request->harga_barang;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->is_approved = $request->is_approved;
        $pengiriman->save();

        return Helper::toJson($pengiriman, "Data pengiriman sudah ditambah");

    }

    public function updatePengiriman(Request $request)
    {

        $pengiriman = Pengiriman::where("id", $request->id)->first();
        $pengiriman->no_pengiriman = $request->no_pengiriman;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_id = $request->lokasi_id;
        $pengiriman->barang_id = $request->barang_id;
        $pengiriman->jumlah_barang = $request->jumlah_barang;
        $pengiriman->harga_barang = $request->harga_barang;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->is_approved = $request->is_approved;
        $pengiriman->save();

        return Helper::toJson($pengiriman, "Data pengiriman sudah diubah");

    }

    public function deletePengiriman($id)
    {

        $pengiriman = Pengiriman::where('id', $id)->first();
        Pengiriman::where('id', $id)->delete();

        return Helper::toJson("", "Data pengiriman sudah dihapus");

    }
}