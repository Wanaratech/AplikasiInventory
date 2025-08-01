<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelBarang;
use App\Models\ModelRekanan;
use Illuminate\Http\Request;

class ControllerPreorder extends Controller
{
    public function TambahPreorder(){

        $datPerlu = [

            'databarang'=> ModelBarang::all(),
            'dataRekanan'=>ModelRekanan::all()

        ];

            return view('Admin.PreOrder.TambahPreorder',$datPerlu);
        }

}
