<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\ViewPengiriman;
use Illuminate\Http\Request;
use App\Pengiriman;
use App\User;
use App\Barang;
use App\Lokasi;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = ViewPengiriman::all();
        return view('pengiriman_list', ['pengiriman' => $pengiriman]);
    }

    public function create()
    {
        $users = User::all();
        $barang = Barang::all();
        $lokasi = Lokasi::all();
        return view('pengiriman_form', compact('users', 'barang', 'lokasi'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'no_pengiriman' => 'required|unique:pengiriman,no_pengiriman',
            'tanggal' => 'required',
            'lokasi_id' => 'required',
            'barang_id' => 'required',
        ]);

        Pengiriman::create([
            'no_pengiriman' => e($request->input('no_pengiriman')),
            'tanggal' => e($request->input('tanggal')),
            'lokasi_id' => e($request->input('lokasi_id')),
            'barang_id' => e($request->input('barang_id')),
            'jumlah_barang' => e($request->input('jumlah_barang')),
            'harga_barang' => e($request->input('harga_barang')),
            'kurir_id' => e($request->input('kurir_id')),
        ]);
        return redirect()->route('pengiriman.index');
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::find($id);
        $users = User::all();
        $barang = Barang::all();
        $lokasi = Lokasi::all();
        return view('pengiriman_edit', compact('pengiriman', 'users', 'barang', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_pengiriman' => 'required|unique:pengiriman,no_pengiriman',
            'tanggal' => 'required',
            'lokasi_id' => 'required',
            'barang_id' => 'required',
        ]);

        $pengiriman = Pengiriman::find($id);
        $pengiriman->no_pengiriman = e($request->input('no_pengiriman'));
        $pengiriman->tanggal = e($request->input('tanggal'));
        $pengiriman->lokasi_id = e($request->input('lokasi_id'));
        $pengiriman->barang_id = e($request->input('barang_id'));
        $pengiriman->jumlah_barang = e($request->input('jumlah_barang'));
        $pengiriman->harga_barang = e($request->input('harga_barang'));
        $pengiriman->kurir_id = e($request->input('kurir_id'));
        $pengiriman->save();

        return redirect()->route('pengiriman.index');
    }




    //=================================================
    //Rest API
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

    public function approvePengiriman(Request $request)
    {

        $pengiriman = Pengiriman::where("id", $request->id)->first();
        $pengiriman->is_approved = $request->is_approved;
        $pengiriman->save();

        return Helper::toJson($pengiriman, "Pengiriman sudah di approve");

    }

    public function deletePengiriman($id)
    {

        $pengiriman = Pengiriman::where('id', $id)->first();
        Pengiriman::where('id', $id)->delete();

        return Helper::toJson("", "Data pengiriman sudah dihapus");

    }
}