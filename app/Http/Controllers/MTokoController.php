<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Toko as toko;

class MTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.indexMtoko',[
          "no" => 1,
          "data" => toko::orderBy('created_at','desc')->paginate(25)
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
         return view('toko.auth.register');
     }

     public function store(Request $request)
     {
       $this->validate($request, [
         'name' => 'required|max:255|unique:tokos',
         'email' => 'required|email|max:255|unique:tokos',
         'password' => 'required|min:6|confirmed',
         'alamat' =>'required|max:255',
         'telepon' => 'required|max:12',
       ]);
       $toko = new toko;

       $toko->name     = $request->name;
       $toko->email    = $request->email;
       $toko->password = bcrypt($request->password);
       $toko->alamat   = $request->alamat;
       $toko->telepon  = $request->telepon;

       if ($toko->save()) {
         return redirect()->action('MTokoController@index')->with('message', 'toko berhasil ditambahkan');
       }else{
         return redirect()->action('MTokoController@index')->with('message', 'toko gagal ditambahkan');
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
        if ( toko::find($id)->delete() ) {
          return redirect()->Action('MTokoController@index')->with('message','data berhasil dihapus');
        }else{
          return redirect()->Action('MTokoController@index')->with('message','data gagal dihapus 01');
        }
    }
}
