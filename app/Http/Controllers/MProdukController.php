<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\m_produk as produk;

use App\Toko as toko;

use App\resolusi as resolusi;

use Image;

use File;

use Storage;

use app\helpers\myHelpers as myHelpers;

class MProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $no = 1;
      $data = produk::orderBy('created_at','desc')->paginate(25);
      return view('admin.indexProduk',[
        'no' => $no,
        'data'=>$data,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createProduk',[
          'resolusi' => resolusi::all()
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
        //
      $this->validate($request, [
          'nama_produk'   => 'required|unique:m_produks|string|max:100|min:5',
          'wide_lens'     => 'required|integer',
          'pixel_cam'     => 'required|integer',
          'id_resolusi'   => 'required|integer',
          'battery'       => 'required|integer',
          'stabilizer'    => 'required|string|size:1',
          'time_lapse'    => 'required|string|size:1',
          'night_mode'    => 'required|string|size:1',
          'wifi'          => 'required|string|size:1',
          'waterproof'    => 'required|string|size:1',
          'lcd'           => 'required|string|size:1',
          'mobile_support'=> 'required|string|size:1',
          'gps'           => 'required|string|size:1',
          'quality'       => 'required|integer',
          'durability'    => 'required|integer',
          'deskripsi'     => 'required',
          'harga_pabrik'       => 'required|integer',
          'foto'          =>'required|mimes:jpg,png,jpeg',
      ]);
      if ($request->hasFile('foto')) {
             $image = $request->file('foto');
             $filename = time() .'-'.$image->getClientOriginalName();
             $location = public_path('storage/' . $filename);
             Image::make($image)->resize(400,400)->save($location);
            //  Image::make($image)->save($location);
             //gasan di database
             $db = new produk;

             $db->foto = $filename;
             $db->nama_produk = $request->nama_produk;
             $db->deskripsi = $request->deskripsi;
             $db->wide_lens = $request->wide_lens;
             $db->pixel_cam = $request->pixel_cam;
             $db->harga_pabrik = $request->harga_pabrik;
             $db->id_resolusi = $request->id_resolusi;
             $db->battery = $request->battery;
             $db->stabilizer = $request->stabilizer;
             $db->time_lapse = $request->time_lapse;
             $db->night_mode = $request->night_mode;
             $db->wifi = $request->wifi;
             $db->waterproof = $request->waterproof;
             $db->lcd = $request->lcd;
             $db->mobile_support = $request->mobile_support;
             $db->gps = $request->gps;
             $db->quality = $request->quality;
             $db->durability = $request->durability;


             if ($db->save()) {
               return redirect()->Action('MProdukController@index')->with('message', 'data berhasil disimpan');
             }else{
               return redirect()->Action('MProdukController@create')->with('messages', 'data gagal disimpan')->withInput()->withErrors();
             }

         }
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
      $foto = produk::find($id);
      $filename = $foto->foto;
      if (File::delete('storage/'.$filename)) {
        if ( produk::find($id)->delete() ) {
          return redirect()->Action('MProdukController@index')->with('message','data berhasil dihapus');
        }else{
          return redirect()->Action('MProdukController@index')->with('message','data gagal dihapus 01');
        }
      }else{
        return redirect()->Action('MProdukController@index')->with('message','data gagal dihapus 02');
      }
    }

}
