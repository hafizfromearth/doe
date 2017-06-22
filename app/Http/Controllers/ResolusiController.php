<?php

namespace App\Http\Controllers;

use App\resolusi as Resolusi;
use Illuminate\Http\Request;
use Validator;

class ResolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.indexResolusi',array(
          "no" => 1,
          "data" => Resolusi::orderby('created_at','desc')->paginate(25),
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.createResolusi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $v = Validator::make($request->all(),array(
          'resolusi' => 'required'
        ));
        if ($v->fails()) {
          return redirect()->action('ResolusiController@create')->withErrors()->withInput();
        }else{
          $db = new resolusi;
          $db->resolusi = $request->resolusi;
          if ($db->save()) {
            return redirect()->action('ResolusiController@index')->with('message','resolusi berhasil ditambahkan');
          }else{
            return redirect()->action('ResolusiController@create')->with('message','resolusi gagal ditambahkan')->withErrors()->withInput();
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\resolusi  $resolusi
     * @return \Illuminate\Http\Response
     */
    public function show(resolusi $resolusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\resolusi  $resolusi
     * @return \Illuminate\Http\Response
     */
    public function edit(resolusi $resolusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\resolusi  $resolusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resolusi $resolusi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resolusi  $resolusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(resolusi $resolusi)
    {
      $sql = resolusi::find($resolusi)->delete();
      if ($sql) {
        return redirect()->action('ResolusiController@index')->with('message','resolusi berhasil dihapus');
      }else{
        return redirect()->action('ResolusiController@create')->with('message','resolusi gagal dihapus');
      }
    }
}
