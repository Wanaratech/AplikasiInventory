<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetailPO extends Model
{
    use HasFactory;

    protected $table = 'tb__p_o_detail';
    protected $fillable  = ['id_po','id_rekanan','id_barang','qty','status','catatan'];

    public $timestamps = false;

    public $incrementing = true;


    
    public function fpo(){
        return $this->belongsTo(ModelPO::class,'id_po','id');
    }

    public function frekanan(){
        return $this->belongsTo(ModelRekanan::class,'id_rekanan','id');
    }

        public function fbarang(){
        return $this->belongsTo(ModelBarang::class,'id_barang','id');
    }




}
