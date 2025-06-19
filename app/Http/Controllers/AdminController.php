<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function HomeAdmin(){

        return response()
        ->view('Admin.DashboardAdmin')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }


    public function ProfileAdmin(){

        return view('Admin.ProfileAdmin');
    }

    //fungsi yang digunakan untuk melakukan pengecekan apakah usrname tersedia atau tidak, dan fungsi ini akan mengambil kridential dari admin yang sedang login
    public function UpDataAdmin(Request $reqdataAdmin){

        $submit = $reqdataAdmin->submit;
        $cancel = $reqdataAdmin->cancel;
        $value =['input','cancel'];

        if ($submit == $value[0]) {
                //ambil semua variable yang ada di form
            $AdminData = [
                'nama'  => $reqdataAdmin->nama,
                'username' => $reqdataAdmin->username,
                'id' => $reqdataAdmin->id

            ];

            $reqdataAdmin->validate([
                'nama' => 'required|string|max:255',
                'username' => ['required', 'string', 'regex:/^\S*$/u'], // tidak boleh mengandung spasi
                'id' => 'required|exists:users,id'
                
            ]);
                
            //cek ketersediaan username di Database
            $cekusername = User::where('username','=',$AdminData['username'])->get();
            $countuser = $cekusername->count();
            //jika tidak tersedia maka bisa update username
            if ($countuser >  0) {
                //jika username ada dan itu adalah id yang sedang login
                if ($cekusername[0] = $AdminData['id']) {
                    //arahkan ke fungsi updateAdminProses
                    return $this->updateAdminProses($AdminData);
                //jika userne ada dan itu adalah bukan kepunyaan yang login
                }else{
                    //Redirect ke akun
                    return redirect()->route('AdminProfil')->with('MsgAkunada','');
                }
                //lakukan update jika memiliki username baru
            }else{
                //arahkan ke fungsi updateAdminProses
                 return $this->updateAdminProses($AdminData);
            }
        }
        //jika user batal memilih maka akan didirrect ke dashboard
        if ($cancel == $value[1]){
           return redirect()->route('DashboardAdmin');
        }

    }

    //fungsi proses update data yang akan dipush ke dalam database
    private function updateAdminProses($AdminData){
            $id = $AdminData['id'];
            $nama = $AdminData['nama'];
            $username  = $AdminData['username'];

            
            try {
                     $updateData = user::find($id);
                     $updateData->username = $username;
                     $updateData->name = $nama;

                     $updateData ->save();
                     return redirect()->route('AdminProfil')->with('MsgBerhasilUp','');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('AdminProfil')->with('gagal','');
            }

    }


     public function logout(){

         Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect()->route('login');
    }
}


