<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ControllerAuthUser extends Controller
{
    

    public function DirrectLoginNonUser(){

        return view('welcome');
    }

    public function UseraddBackend(){

        return view('registerAdmin');
    }

    public function Registeruser(request $reqdatainput)
    {

        $nama = $reqdatainput->nama;
        $username = $reqdatainput->username;
        $password = $reqdatainput->password;
        $JA = $reqdatainput->jenisAkun;

        $cekketersediaaan  = User::where('username','=',$username)->count();

        if ($cekketersediaaan > 0) {
            return redirect()->route('userReg')->with('MsgAkunada','');
        }else{
            try {
            $inputtoTableUser = new User;
            
            $inputtoTableUser->fill([
            'name'=>$nama,
            'username' =>$username,
            'password' => $password,
            'jenis_akun' => $JA
            ]);

            $inputtoTableUser->save();
            return redirect()->route('login')->with('MsgDone','');
            



        } catch (\Throwable $th) {
            Echo"Gagal Simpan";
        }

        }

        
    }
}
