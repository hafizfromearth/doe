<?php

namespace App\Http\Controllers;

use App\t_produk as t_produk;

use App\m_produk as m_produk;

use Illuminate\Http\Request;

use DB;

use Auth;

class TProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id_toko = Auth::user()->id;
        $data = t_produk::where('id_toko',$id_toko)->orderBy('created_at','desc')->paginate(25);

        return view('toko.indexTproduk',[
          "no" => 1,
          "data" => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      //select * from tabel m produks
        $id= t_produk::all('id_produk');
      //get id nya dan buat dalam array
      //query not in SELECT * FROM m_produks WHERE id NOT IN (1)
        $m_produk = DB::table('m_produks')
                    ->whereNotIn('id',$id)
                    ->get();
      return view('toko.createTproduk',[
        "no" => 1,
        "m_produk" => $m_produk,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request , array(
        "id_produk" => "required|integer|unique:t_produks",
        "harga_toko"=> "required|integer",
      ));

      $db = new t_produk;
      $db->id_produk  = $request->id_produk;
      $db->harga_toko = $request->harga_toko;
      $db->id_toko    = Auth::user()->id;

      if ($db->save()) {
        return redirect()->Action('TProdukController@index')->with('message', 'data berhasil disimpan');
      }else{
        return redirect()->Action('TProdukController@create')->with('messages', 'data gagal disimpan')->withInput()->withErrors();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_produk  $m_produk
     * @return \Illuminate\Http\Response
     */
    public function show(m_produk $m_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_produk  $m_produk
     * @return \Illuminate\Http\Response
     */
    public function edit(m_produk $m_produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_produk  $m_produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_produk $m_produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_produk  $m_produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_produk $m_produk)
    {
        //
        $barang = m_produk::find($id);
        if ($barang->delete()==true) {
          return redirect()->action('TProdukController@index')->with('message', 'barang berhasil dihapus');
        }
    }
}
