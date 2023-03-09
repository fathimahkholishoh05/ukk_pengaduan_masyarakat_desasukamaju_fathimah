<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tanggapan'] = Pengaduan::where('status',"!=","selesai")->get();
        return view('petugas.home',$data);
    }

    public function viewTanggapan()
	{		
		$data['tanggapan1'] = Tanggapan::get();
		return view('Petugas.index',$data);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peugas  $peugas
     * @return \Illuminate\Http\Response
     */
    public function show(Peugas $peugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peugas  $peugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Peugas $peugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peugas  $peugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peugas $peugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peugas  $peugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peugas $peugas)
    {
        //
    }
}
