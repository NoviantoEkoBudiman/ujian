<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::get();
        return view("jabatan.index", compact("jabatan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jabatan.create");
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
            'jabatan_nama'              => 'required',
            'jabatan_deskripsi'    => 'required',
        ],
        [
            'jabatan_nama.required'             => 'Nama jabatan tidak boleh kosong',
            'jabatan_deskripsi.required'   => 'Deskripsi tidak boleh kosong',
        ]);
        
        $jabatan = new Jabatan;
        $jabatan->jabatan_nama      = $request->jabatan_nama;
        $jabatan->jabatan_deskripsi = $request->jabatan_deskripsi;
        $jabatan->save();

        return redirect()->route("jabatan.index")->with('success', 'Data jabatan telah disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view("jabatan.edit", compact("jabatan"));
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
            'jabatan_nama'      => 'required',
            'jabatan_deskripsi' => 'required',
        ],
        [
            'jabatan_nama.required'         => 'Nama jabatan tidak boleh kosong',
            'jabatan_deskripsi.required'    => 'Deskripsi tidak boleh kosong',
        ]);
        
        $jabatan = Jabatan::find($id);
        $jabatan->jabatan_nama      = $request->jabatan_nama;
        $jabatan->jabatan_deskripsi = $request->jabatan_deskripsi;
        $jabatan->save();

        return redirect()->route("jabatan.index")->with('success', 'Data jabatan telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect()->route("jabatan.index")->with('success', 'Data jabatan telah dihapus.');
    }
}
