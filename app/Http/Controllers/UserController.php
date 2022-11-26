<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Task;
use App\Models\ListTask;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('jabatan')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::get();
        return view('user.create', compact("jabatan"));
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
            'username'          => 'required',
            'user_jabatan_id'   => 'required',
            'password'          => 'required',
        ],
        [
            'user_nama.required'            => 'Nama tidak boleh kosong',
            'username.required'             => 'Username tidak boleh kosong',
            'user_jabatan_id.required'      => 'Jabatan tidak boleh kosong',
            'password.required'             => 'Password tidak boleh kosong',
        ]);
        
        $user = new User;
        $user->user_nama        = $request->user_nama;
        $user->username         = $request->username;
        $user->user_jabatan_id  = $request->user_jabatan_id;
        $user->password         = Hash::make($request->password);

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
        $data['task']       = Task::get();
        $data['list_task']  = ListTask::with('task','user')->where("list_user_id", $id)->get();
        $data['user']       = User::find($id);
        return view('user.add_task', $data);
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
            'username'          => 'required',
            'user_jabatan_id'   => 'required',
            'password'          => 'required',
        ],
        [
            'user_nama.required'            => 'Nama tidak boleh kosong',
            'username.required'             => 'Username tidak boleh kosong',
            'user_jabatan_id.required'      => 'Jabatan tidak boleh kosong',
            'password.required'             => 'Password tidak boleh kosong',
        ]);

        $user                   = User::find($id);
        $user->user_nama        = $request->user_nama;
        $user->username         = $request->username;
        $user->user_jabatan_id  = $request->user_jabatan_id;
        $user->password         = Hash::make($request->password);
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
