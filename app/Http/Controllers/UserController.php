<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $userData = $request->all();
        $user = User::create($userData);

        return $user;
    }

    public function getKurir()
    {
        $kurir = User::orderBy("id", "desc")->get();
        return Helper::toJson($kurir);
    }

    public function createKurir(Request $request)
    {

        $kurir = new User();
        $kurir->name = $request->name;
        $kurir->email = $request->email;
        $kurir->password = $request->password;
        $kurir->save();

        return Helper::toJson($kurir, "Data kurir sudah ditambah");

    }

    public function updateKurir(Request $request)
    {

        $kurir = User::where("id", $request->id)->first();
        $kurir->name = $request->name;
        $kurir->email = $request->email;
        $kurir->password = $request->password;
        $kurir->save();

        return Helper::toJson($kurir, "Data kurir sudah diubah");

    }

    public function deleteKurir($id)
    {

        $kurir = User::where('id', $id)->first();
        User::where('id', $id)->delete();

        return Helper::toJson("", "Data kurir sudah dihapus");

    }
}