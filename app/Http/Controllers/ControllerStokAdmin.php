<?php

namespace App\Http\Controllers;

use App\Models\ModelAlurStok;
use App\Models\ModelBarang;
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
    public function Alurstokview(){

        $gatdaatstokforalur = [

            'databarang' =>ModelBarang::all()

        ];  

        return view('Admin.Stok.AlurStokbarang',$gatdaatstokforalur);
    }


    public function ToolsAlurStok(Request $reqdata ){
            $id = $reqdata->idbarang;

            $GetAlldatabarang = [

                'databarang'=>ModelBarang::where('id','=',$id)->first(),
                'alurstok'=>ModelAlurStok::where('idbarang','=',$id)->with('barangidAl')->get()
            ];

            return view('Admin.Stok.Alurstok',$GetAlldatabarang);



    }
}
