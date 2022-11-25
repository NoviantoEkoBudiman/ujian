<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\User;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::get(); 
        return view("inventaris.index", compact("inventaris"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view("inventaris.create", compact("users"));
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
            'inventaris_nama_barang'    => 'required',
            'inventaris_user_id'        => 'required',
        ],
        [
            'inventaris_nama_barang.required'   => 'Nama barang tidak boleh kosong',
            'inventaris_user_id.required'       => 'Nama pengguna inventaris tidak boleh kosong',
        ]);
        
        $inventaris = new Inventaris;
        $inventaris->inventaris_nama_barang   = $request->inventaris_nama_barang;
        $inventaris->inventaris_user_id       = $request->inventaris_user_id;
        $inventaris->save();

        return redirect()->route("inventaris.index")->with('success', 'Data inventaris telah disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['inventaris'] = Inventaris::find($id);
        $data['users'] = User::get();
        return view("inventaris.edit", $data);
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
            'inventaris_nama_barang'    => 'required',
            'inventaris_user_id'        => 'required',
        ],
        [
            'inventaris_nama_barang.required'   => 'Nama barang tidak boleh kosong',
            'inventaris_user_id.required'       => 'Nama pengguna inventaris tidak boleh kosong',
        ]);
        
        $inventaris = Inventaris::find($id);
        $inventaris->inventaris_nama_barang   = $request->inventaris_nama_barang;
        $inventaris->inventaris_user_id       = $request->inventaris_user_id;
        $inventaris->save();

        return redirect()->route("inventaris.index")->with('success', 'Data inventaris telah disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);
        $inventaris->delete();
        return redirect()->route("inventaris.index")->with('success', 'Data inventaris telah dihapus.');
    }
}
