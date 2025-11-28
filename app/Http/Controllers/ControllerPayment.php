<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MOdelMetodeBayar;
use Illuminate\Http\Request;

class ControllerPayment extends Controller
{
    //

    public function Homepayment(){

        $varpayment = [

            'datapayment'=>MOdelMetodeBayar::with('metodebayar')->get(),
        ];

        return view('Admin.Payment.Homepayment',$varpayment);

    }
}
