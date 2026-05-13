<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
class UserController extends Controller
{
    //
    public function index()
{
    return view('user.index',[
        "title"=>"Data Pengguna",
        "data"=>User::all()
    ]);
}
public function store(Request $request):RedirectResponse
{
    $request->validate([
        "name"=>"required",
        "email"=>"required",
        "password"=>"required",
    ]);

    User::create($request->all());
    return redirect()->route('pengguna.index')->with('success','Data Pengguna Berhasil Ditambahkan');
}
}
