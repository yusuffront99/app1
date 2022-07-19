<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'grade',
        'shift',
        'supervisor',
        'foto'
    ];
}
