<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';

    protected $fillable = [
        'nama_cabang',
        'alamat',
        'id_operator_cabang'
    ];

    public function operator(){
        return $this->belongsTo(User::class, 'id_operator_cabang' , 'id');
    }
}
