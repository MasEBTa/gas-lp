<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use Illuminate\Http\Request;

class FitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fitur = Fitur::orderBy('urutan')->get();
        // return $fitur;
        return view('fiture', compact('fitur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request)
{
    // Ambil data dengan urutan yang diketahui
    $data = Fitur::where('urutan', $request->urutan)->first();

    if ($data) {
        $noNow = $data->urutan;
        // Ambil data di atasnya berdasarkan kriteria tertentu
        $dataAbove = Fitur::where('urutan', '<', $data->urutan)
                            ->orderBy('urutan', 'desc')
                            ->first();

        if ($dataAbove !== null) {
            $noAbove = $dataAbove->urutan;
            $data->update(['urutan' => $noAbove]);
            $dataAbove->update(['urutan' => $noNow]);
            return 'success';
        } else {
            return 'Data ini adalah data teratas';
        }
    } else {
        return 'Data tidak ditemukan';
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
