<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelBarang;
use App\Models\ModelDetailPO;
use App\Models\ModelPO;
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

    public function ProsesPO(request $reqDataPO){

        $dataPO = [
                'idrekanan'=>$reqDataPO->idrek,
                'pesan'=>$reqDataPO->pesan,
                'idpo'=>$reqDataPO->idpo,
                'item'=>$reqDataPO->items


        ];

        return $this->TambahPOKeDB($dataPO);

    }

    private function TambahPOKeDB($dataPO){

        $idrekanan = $dataPO['idrekanan'];
        $idpo = $dataPO['idpo'];
        $pesan = $dataPO['pesan'];
        $items = $dataPO['item'];
        $status = "Open";
        $totalHrgPO = 0;
        foreach ($items as $item) {
            
             $cekhargabarang = ModelBarang::where('id','=',$item['barang'])->first();

             $inputkeDBDetail = new ModelDetailPO();
             $inputkeDBDetail->fill([
                'id_po'=>$idpo,
                'id_rekanan'=>$idrekanan,
                'id_barang'=>$item['barang'],
                'qty'=>$item['jumlah'],
                'status'=>$status,
                'catatan'=>$pesan
             ]);

            $totalharga =  $cekhargabarang['HargaJual']*$item['jumlah'];
            $hargatotalTodb = $totalHrgPO += $totalharga;             
              $inputkeDBDetail->save(); 
        }

        $inputtoPO = new ModelPO();
        $inputtoPO->fill([
            'id'=>$idpo,
            'total'=>$hargatotalTodb,
            'keterangan'=>$status
        ]);

        $inputtoPO->save();

        return redirect()->route('PurOrder')->with('msgdone');
    }



    public function DataPO(){

        $datapo = [

            'po' => ModelPO::all()
        ];

        return view('Admin.PreOrder.DataPO',$datapo);
    }


    public Function DetailPO(request $reqdetailapo){

        $id = $reqdetailapo->idpoDetail;
        $getdata = [
            'datapo' => ModelDetailPO::with(['fpo','fbarang','frekanan'])
                                     ->where('id_po','=',$id)->get()
        ];

        return view('Admin.PreOrder.DetailPO',$getdata);


    }
}
