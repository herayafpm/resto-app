<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDaftarMakananMinumanRequest;
use App\Http\Requests\EditDaftarMakananMinumanRequest;
use App\Models\DaftarMakananMinuman;
use Illuminate\Http\Request;

class DaftarMakananMinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftars = DaftarMakananMinuman::all();
        return view('admin.master.daftar_makanan_minuman.index',['page_title' => 'Daftar Makanan Minuman','daftars' => $daftars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.daftar_makanan_minuman.create',['page_title' => 'Tambah Daftar Makanan Minuman']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDaftarMakananMinumanRequest $request)
    {
        $makanan = new DaftarMakananMinuman();
        $makanan->fill($request->all());
        $makanan->save();
        return redirect()->route('admin.master.daftar_makanan_minuman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarMakananMinuman  $daftarMakananMinuman
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarMakananMinuman $daftarMakananMinuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarMakananMinuman  $daftarMakananMinuman
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarMakananMinuman $daftarMakananMinuman)
    {
        return view('admin.master.daftar_makanan_minuman.edit',['page_title' => 'Edit Daftar Makanan Minuman','makanan' => $daftarMakananMinuman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarMakananMinuman  $daftarMakananMinuman
     * @return \Illuminate\Http\Response
     */
    public function update(EditDaftarMakananMinumanRequest $request, DaftarMakananMinuman $daftarMakananMinuman)
    {
        $makanan = $daftarMakananMinuman;
        $makanan->fill($request->all());
        $makanan->save();
        return redirect()->route('admin.master.daftar_makanan_minuman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarMakananMinuman  $daftarMakananMinuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarMakananMinuman $daftarMakananMinuman)
    {
        $daftarMakananMinuman->delete();
        return redirect()->route('admin.master.daftar_makanan_minuman.index');
    }
}
