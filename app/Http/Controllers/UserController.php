<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\User;

class UserController extends Controller
{
    // public function store(Request $request)
    // {
    //     $userData = $request->all();
    //     $user = User::create($userData);

    //     return $user;
    // }

    public function index()
    {
        $user = User::all();
        return view('kurir_list', ['user' => $user]);
    }

    public function create()
    {
        return view('kurir_form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => e($request->input('name')),
            'email' => e($request->input('email')),
            'password' => e($request->input('password')),
        ]);
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('kurir_edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = e($request->input('name'));
        $user->email = e($request->input('email'));
        $user->password = e($request->input('password'));
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }



    //=================================================
    //Rest API

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