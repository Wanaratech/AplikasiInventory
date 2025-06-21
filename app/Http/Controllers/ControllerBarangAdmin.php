<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerBarangAdmin extends Controller
{
         public function KategoriBarangView(){

            return view('Admin.Barang.kategori');
         }
}
