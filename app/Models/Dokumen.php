<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klasifikasi;
use App\Models\User;

class Dokumen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function klasifikasis()
    {
        return $this->belongsTo(Klasifikasi::class, 'klasifikasi_id');
    }
}
