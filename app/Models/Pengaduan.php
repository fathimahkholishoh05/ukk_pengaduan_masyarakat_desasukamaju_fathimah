<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tanggapan;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function masyarakat()
    {
        return $this->hasOne('App\masyarakat', 'nik', 'nik');
    }

    // public function tanggapans()
    // {
    //     // return $this->belongsTo('App\Models\Tanggapan', 'id', 'id_pengaduan');
    // }
    
    public function tanggapans()
    {
        return $this->belongsTo(Tanggapan::class, 'id_pengaduan');
        // return $this->hasOne('App\Models\Tanggapan', 'id_pengaduan');
    }

}
