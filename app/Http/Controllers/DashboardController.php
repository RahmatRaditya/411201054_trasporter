<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Lokasi;
use App\User;
use Illuminate\Http\Request;
use App\ViewPengiriman;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        //pie chart
        $lastMonth = Carbon::now()->subMonth();
        $oneYearAgo = Carbon::now()->subYear();
        $threeMonth = Carbon::now()->subMonth(3);

        $listBarang = DB::table('view_pengiriman')->where('harga_barang', '>', 1000)->whereDate('tanggal', '>', $oneYearAgo)->
            select('nama_barang', DB::raw("count(id) as total"))->
            groupBy('id_barang')->get();

        $listLokasi = DB::table('view_pengiriman')->where('jumlah_barang', '>', 100)->whereDate('tanggal', '>', $lastMonth)->
            select('nama_lokasi', DB::raw("count(id) as total"))->
            groupBy('id_lokasi')->get();

        //get data pengiriman dan jumlah
        $allPengiriman = ViewPengiriman::whereDate('tanggal', '>', $threeMonth);
        $countPengiriman = $allPengiriman->count();

        $trendLokasi = DB::table('view_pengiriman')->whereDate('tanggal', '>', $oneYearAgo)->
            select('nama_lokasi', DB::raw("count(id) as total"))->
            orderBy('total', 'desc')->
            groupBy('id_lokasi')->get();

        $trendBarang = DB::table('view_pengiriman')->whereDate('tanggal', '>', $oneYearAgo)->
            select('nama_barang', DB::raw("sum(jumlah_barang) as total"))->
            orderBy('total', 'desc')->
            groupBy('id_barang')->get();

        //get data kurir dan jumlah
        $allKurir = User::all();
        $countKurir = $allKurir->count();

        //get data lokasi dan jumlah
        $allLokasi = Lokasi::all();
        $countLokasi = $allLokasi->count();


        //get data barang dan jumlah
        $allBarang = Barang::all();
        $countBarang = $allBarang->count();

        return view('dashboard', compact('listBarang', 'listLokasi', 'countPengiriman', 'trendLokasi', 'countKurir', 'trendBarang'));

    }
}