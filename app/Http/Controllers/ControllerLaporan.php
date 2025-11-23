<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerLaporan extends Controller
{
    //

    public function LaporanHome(){

        return View('Admin.Laporan.Home');
    }


    public function Jurnalselected(){

        $tipeselected = ['selected'=>'Jurnal'];

        return view('Admin.Laporan.Rentangtanggal',$tipeselected);
    }

     public function Labarugiselected(){

        $tipeselected = ['selected'=>'Laba-Rugi'];

        return view('Admin.Laporan.Rentangtanggal',$tipeselected);
    }

     public function Neracaselected(){

        $tipeselected = ['selected'=>'Neraca'];

        return view('Admin.Laporan.Rentangtanggal',$tipeselected);
    }


    Public function ProsesLaporan(request $reqdatalaporan){



       $jenislaporan  = $reqdatalaporan-> jenis;


       //mengambil tanggal 
       $tanggal  = ['tanggalAwal'=>$reqdatalaporan->tglawal,
                    'tanggalAkhir'=>$reqdatalaporan->tglakhir];
        
                    //logika tanggal 
        
                    if ($tanggal['tanggalAwal'] > $tanggal['tanggalAkhir']) {
                        # code...
                        return redirect()->route('Laporan')->with('MsgTglError','');
                    }else{
                        //redirect ke fungsi masing masing sesuai jenis laporan
                        if ($jenislaporan =='Jurnal') {
                            # code...
                                return $this->PanggilJurnal($tanggal);
                        }elseif ($jenislaporan=='Laba-Rugi') {
                            # code...
                                return $this->PanggilLabaRugi($tanggal);
                        }elseif ($jenislaporan=='Neraca') {
                            # code...
                             return $this->PanggilNeraca($tanggal);
                        }
                    }

    }

    //fungsi memanggil Jurnal
    Private Function PanggilJurnal($tanggal){

        echo " Memanggil Jurnal Pada Tanggal".$tanggal['tanggalAwal']."Sampai".$tanggal['tanggalAkhir'];
    }


       Private Function PanggilLabaRugi($tanggal){

        echo " Memanggil Laba Rugi Pada Tanggal".$tanggal['tanggalAwal']."Sampai".$tanggal['tanggalAkhir'];
    }

       Private Function PanggilNeraca($tanggal){

        echo " Memanggil Neraca Pada Tanggal".$tanggal['tanggalAwal']."Sampai".$tanggal['tanggalAkhir'];
    }


    
}
