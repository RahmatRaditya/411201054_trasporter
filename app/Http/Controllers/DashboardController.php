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

        //get data visit/transaksi dan jumlah count
        $allVisit = ViewPengiriman::whereDate('tanggal', '>', $threeMonth);
        $countVisit = $allVisit->count();

        $trendLokasi = DB::table('view_pengiriman')->whereDate('tanggal', '>', $oneYearAgo)->
            select('nama_lokasi', DB::raw("count(id) as total"))->
            orderBy('total', 'desc')->
            groupBy('id_lokasi')->get();

        $trendBarang = DB::table('view_pengiriman')->whereDate('tanggal', '>', $oneYearAgo)->
            select('nama_barang', DB::raw("count(id) as total"))->
            orderBy('total', 'desc')->
            groupBy('id_barang')->get();

        //get data sales dan jumlah count
        $allSales = User::all();
        $countSales = $allSales->count();

        //get data outlet dan jumlah count
        $allOutlet = Lokasi::all();
        $countOutlet = $allOutlet->count();


        //get data barang dan jumlah count
        $allBarang = Barang::all();
        $countBarang = $allBarang->count();



        // if(Auth::user()->level == 1){
        //     return view('dashboard.index', compact('listBarang','listOutlet','countVisit','countOutlet','countSales','countBarang'));

        // } else {
        //     return redirect('transaksi');
        // }

        return view('dashboard', compact('listBarang', 'listLokasi', 'countVisit', 'trendLokasi', 'countSales', 'trendBarang'));

    }
}