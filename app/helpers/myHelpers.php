<?php

namespace App\Helpers;

Class myHelpers{

  public static function rupiah($integer){
    $rupiah = 'Rp.'.number_format($integer, 2 , ',' , '.');
    return $rupiah;
  }


}
