<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warna extends Model
{
    use HasFactory;
    protected $table = "warnas";
    protected $primaryKey = "id";
    protected $fillable =['kode_warna','nama_warna','id_kategori','deskripsi','nilai_rgb','nilai_hex'];
    

    public function kategorii(){
        return $this->belongsTo(kategori::class,'id_kategori');
    }
}