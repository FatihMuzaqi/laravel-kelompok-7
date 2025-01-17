<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $primaryKey = "id";
    protected $fillable = ['id','kategori'];

    public function warnaa(){
        return $this->hasMany(warna::class,'id_kategori');
    }

}
