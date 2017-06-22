<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_produk extends Model
{
    //
    public function toko()
    {
      return $this->belongsTo('App\toko', 'id_toko');
    }

    public function produk()
    {
      return $this->belongsTo('App\m_produk', 'id_produk');
    }
}
