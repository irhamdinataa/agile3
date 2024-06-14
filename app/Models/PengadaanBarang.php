<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengadaanBarang extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $primarykey = ['id'];
    protected $fillable = ['namabarang', 'jumlah', 'penanggung_jawab', 'status'];
}
