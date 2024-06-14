<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananCustomer extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primarykey = ['id'];
    protected $table = "pesanan_customers";
    protected $fillable = ['namabarang', 'kebutuhan', 'done', 'todo'];
}
