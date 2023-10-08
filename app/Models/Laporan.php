<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = ['email','nama', 'npm', 'jenis', 'judul','verifikasi', 'prodi', 'dosen','jurnal'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
