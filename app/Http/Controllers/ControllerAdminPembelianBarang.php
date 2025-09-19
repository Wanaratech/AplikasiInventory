<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Controller\ControllerReference;

class ControllerAdminPembelianBarang extends Controller
{
    //


    public function PembelianView(){

        return view('Admin.Pembelian.DataPembelian');
    }
}
