<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahapan_apply extends Model
{
    use HasFactory;

    protected $table = 'tahapan_apply';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idapply',
        'idtahapan',
        'nilai',
        'tgl_update'
    ];

    public function applyLoker()
    {
        return $this->belongsTo(ApplyLoker::class, 'idapply', 'idapply');
    }

    public function tahapan()
    {
        return $this->belongsTo(Tahapan::class, 'idtahapan', 'idtahapan');
    }
}