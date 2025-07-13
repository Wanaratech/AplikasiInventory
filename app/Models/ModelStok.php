<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStok extends Model
{
    use HasFactory;
     protected $table = 'tb_stok';

    protected $primaryKey = 'id';
    protected $fillable  = ['id','idbarang','stok','pertanggal'];

    public $timestamps = false;

    public $incrementing = true;

     public function barangist(){
        return $this->belongsTo(ModelBarang::class,'idbarang');
    }

}
