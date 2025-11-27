<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOdelMetodeBayar extends Model
{
    use HasFactory;

      protected $table = 'tb_metodepembayaran';
    protected $fillable = ['id','nama_metode','idcoa'];
    
    public $timestamps = true;

    public $incrementing = true;


      public function metodebayar(){
        return $this->belongsTo(Model_chartAkun::class,'idcoa');
    }

}
