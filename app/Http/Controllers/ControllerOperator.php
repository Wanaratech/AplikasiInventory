<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelOperator;
use Illuminate\Http\Request;

class ControllerOperator extends Controller
{
    //
    public function OperatorHome(){
        $operatorget = [
            'operator'=>ModelOperator::all()
        ];
        return view('Admin.Operator.operatorhome', $operatorget);
    }

    public function Operatoraddform(){
        return view('Admin.Operator.operatoradd');
    }

    public function OperatorAdd(Request $request){
        // return $request->all();
        ModelOperator::create([
            // 'id'=>$request->id,
            'nama_operator'=>$request->namaoperator,
        ]);

        return redirect()->route('OperatorHome')->with('msgdone','');
    }
}
