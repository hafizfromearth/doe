<?php

namespace App\Http\Controllers;

use App\rekomendasi;
use Illuminate\Http\Request;
use App\m_produk as produk;
use DB;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createRekomendasi');
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
        $this->validate($request,[
          'kegiatan' => 'required',
          'min_price' => 'required|integer',
          'max_price' => 'required|integer',
          'index_harga' =>'required',
        ]);

        if ($request->index_harga == 'toko') {
          #berdasarakan harga toko pad atabel t_produk
            $sql = DB::table('t_produks')->whereBetween('harga_toko',[$request->min_price , $request->max_price])->get();
        }else{
            $sql = DB::table('m_produks')->whereBetween('harga_pabrik',[$request->min_price , $request->max_price])->get();
        }
        return view('admin.resultRekomendasi' , [
          'no'=> 1 , 'data' => $sql,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekomendasi $rekomendasi)
    {
        //
    }
}
