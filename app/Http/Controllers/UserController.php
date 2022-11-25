<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_nama'         => 'required',
            'user_username'     => 'required',
            'user_jabatan_id'   => 'required',
            'password'          => 'required',
        ],
        [
            'user_nama.required'            => 'Nama tidak boleh kosong',
            'user_username.required'        => 'Username dinas tidak boleh kosong',
            'user_jabatan_id.required'      => 'Jabatan tidak boleh kosong',
            'password.required'             => 'Password tidak boleh kosong',
        ]);
        
        $user = new User;
        $user->user_nama        = $request->user_nama;
        $user->user_username    = $request->user_username;
        $user->user_jabatan_id  = $request->user_jabatan_id;
        $user->password         = $request->password;

        $user->save();

        return redirect()->route("user.index")->with('success', 'Data user telah disimpan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_nama'         => 'required',
            'user_username'     => 'required',
            'user_jabatan_id'   => 'required',
            'password'          => 'required',
        ],
        [
            'user_nama.required'            => 'Nama tidak boleh kosong',
            'user_username.required'        => 'Username dinas tidak boleh kosong',
            'user_jabatan_id.required'      => 'Jabatan tidak boleh kosong',
            'password.required'             => 'Password tidak boleh kosong',
        ]);

        $user                   = User::find($id);
        $user->user_nama        = $request->user_nama;
        $user->user_username    = $request->user_username;
        $user->user_jabatan_id  = $request->user_jabatan_id;
        $user->password         = $request->password;
        $user->save();
        
        return redirect()->route("user.index")->with('success', 'Data user telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("user.index")->with('success', 'Data user telah dihapus.');
    }
}
