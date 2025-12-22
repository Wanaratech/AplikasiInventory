<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelBarang;
use App\Models\MOdelMetodeBayar;
use App\Models\ModelNotaPembelianBarang;
use App\Models\ModelPembelianBarang;
use Illuminate\Http\Request;

class ControllerPembelian extends Controller
{
    //
    public function PembelianView(){

        $getpembelian = [

            'pembelianbarang'=>ModelPembelianBarang::with('notaPembelian')->with('barangBeli')->get(),
        ];
        return view('Admin.Pembelian.pembelianbarang',$getpembelian);
    }


    public function pembeliantambah(){

        $data = 
        [

            'databarang'=>ModelBarang::all(),
            'datametodebayar'=>MOdelMetodeBayar::all()
        ];
        return view('Admin.Pembelian.tambahpembelian',$data);
    }


    public function ProsesPembelian(Request $reqdata ){

        $datareq = $reqdata->all();
         return $this->TambahNotaHandle($datareq);
    }

    private function TambahNotaHandle($datareq){

        $inputnota = new ModelNotaPembelianBarang();

        $inputnota->fill([

            'total'=>$datareq['total'],
            'dibayar'=>$datareq['deposit'],
            'sisa'=>$datareq['total']-$datareq['deposit'],
            'catatan'=>$datareq['catatan'],


            //logika untuk status nota, jika sudah selesai atau 0 maka lunas jika kurang ada sisa bearti hutang usaha


        ]);


        
        
    }
}
