<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOdelJurnal extends Model
{
    use HasFactory;

     protected $table = 'tb_jurnal';
    protected $fillable = [
        'id',
        'id_akun',
        'debit',
        'kredit',
        'idnota',
    ];

    public $timestamps = true;

    public $incrementing = true;


      public function idakun(){
        return $this->belongsTo(Model_chartAkun::class,'id_akun');
    }


}
