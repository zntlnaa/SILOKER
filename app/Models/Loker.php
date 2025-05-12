<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'loker'; // Pastikan ini sesuai dengan nama tabel yang ada dalam database Anda
    protected $primaryKey = 'idloker';
    use HasFactory;
    protected $fillable = [
        'idloker',
        'idperusahaan',
        'nama', // Tambahkan kolom "semester" ke dalam daftar $fillable
        'tipe',
        'usia_min',
        'usia_max',
        'gaji_min',
        'gaji_max',
        'nama_cp',
        'email_cp',
        'no_telp_cp',
        'tgl_update',
        'tgl_aktif',
        'tgl_tutup',
        'status',
    ];
}

