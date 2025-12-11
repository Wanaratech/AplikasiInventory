<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembayaranNota extends Model
{
    use HasFactory;

    protected $table = 'tb_pembayaran_nota';
    protected $fillable  = ['id','totalbayar','deposit','sisapembayaran','idwo'];

    public $timestamps = true;

    public $incrementing = false;

    
      public function ModelwoRS(){
        return $this->belongsTo(ModelWO::class,'idwo');
    }

      public function nota(){
          return $this->hasMany(ModelNota::class, 'id_pembayaran');
      }

}
