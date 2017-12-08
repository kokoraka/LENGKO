<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;

class MethodController extends BaseController {

  public function get_navbar($auth) {
    $navbar = DB::table('halaman')
      ->join('halaman_detil', 'halaman.kode_halaman', '=', 'halaman_detil.kode_halaman')
      ->where('halaman_detil.kode_otoritas', '=', $auth)
      ->where('halaman_detil.status_halaman_detil', '=', TRUE)
      ->select('halaman.kode_halaman', 'halaman.nama_halaman', 'halaman.ikon_halaman')
      ->orderby('urutan_halaman', 'asc')
      ->get();
    return ($navbar);
  }

  public function num_to_rp($number, $digit = 0) {
    if (isset($number) && isset($digit)) {
      return 'Rp' . number_format($number, $digit, ',','.');
    }
  }

  public function cut_string($desc, $length) {
    return substr($desc, $length);
  }

  public function menu_type($type) {
    $res = "Makanan";
    if ($type == "D") {
      $res= "Minuman";
    }
    return $res;
  }

  public function rewrite($type, $param) {
    $res = false;
    switch ($type) {
      case 'date':

      break;
      case 'time':

      break;
      default:break;
    }
    return $res;
  }

  public function msg($type) { //notification
    $msg = '';
    switch ($type) {
      case 'value':
        $msg = '';
      break;
      default:
        $msg = '';
      break;
    }
    return $msg;
  }

}
