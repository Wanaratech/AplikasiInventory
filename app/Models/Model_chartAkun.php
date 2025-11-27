<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_chartAkun extends Model
{
    use HasFactory;

     protected $table = 'tb_chart_akun';
    protected $fillable = [
        'id',
        'id_tipeakun',
        'kode',
        'nama',
        'keterangan',
        'saldo_awal',
        'tanggal_saldo_awal',
        'saldo'
    ];
    
    public $timestamps = true;

    public $incrementing = true;

      public function tipeakun(){
        return $this->belongsTo(Model_tipeakun::class,'id_tipeakun');
    }

      public function jurnaltoakun(){
        return $this->hasmany(MOdelJurnal::class,'id_akun');

    }

    public function metodebayar(){
        return $this->hasmany(MOdelMetodeBayar::class,'idcoa');

    }
}
