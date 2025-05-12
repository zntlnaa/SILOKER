<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply_loker extends Model
{
    protected $table = 'apply_loker';
    use HasFactory;
    protected $primaryKey = 'idapply';

    protected $fillable = [
        'idloker',
        'noktp', 
        'tgl_apply',
    ];
}