<?php

namespace App\Http\Controllers;

use App\Models\ModelStok;
use Illuminate\Http\Request;

class ControllerStokAdmin extends Controller
{
    //

    public function JumlahStokBarangView(){
        $getdataStok=[

            'datastok'=>ModelStok::with('barangist')->get()
        ];

        return view('Admin.Stok.StokBarang',$getdataStok);
    }
}
