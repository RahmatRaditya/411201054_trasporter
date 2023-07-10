<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang_list', ['barang' => $barang]);
    }

    public function create()
    {
        return view('barang_form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang',
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        Barang::create([
            'kode_barang' => e($request->input('kode_barang')),
            'nama_barang' => e($request->input('nama_barang')),
            'deskripsi' => e($request->input('deskripsi')),
            'stok_barang' => e($request->input('stok_barang')),
            'harga_barang' => e($request->input('harga_barang')),
        ]);
        return redirect()->route('barang.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang_edit', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        $barang = Barang::find($id);
        $barang->kode_barang = e($request->input('kode_barang'));
        $barang->nama_barang = e($request->input('nama_barang'));
        $barang->deskripsi = e($request->input('deskripsi'));
        $barang->stok_barang = e($request->input('stok_barang'));
        $barang->harga_barang = e($request->input('harga_barang'));
        $barang->save();

        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }



    //=================================================
    //Rest API

    public function getBarang()
    {
        $barang = Barang::orderBy("id", "desc")->get();
        return Helper::toJson($barang);
    }

    public function createBarang(Request $request)
    {

        $barang = new Barang();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->save();

        return Helper::toJson($barang, "Data barang sudah ditambah");

    }

    public function updateBarang(Request $request)
    {

        $barang = Barang::where("id", $request->id)->first();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->save();

        return Helper::toJson($barang, "Data barang sudah diubah");

    }

    public function deleteBarang($id)
    {

        $barang = Barang::where('id', $id)->first();
        Barang::where('id', $id)->delete();

        return Helper::toJson("", "Data barang sudah dihapus");

    }
}