<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
   protected $table = 'tanggapan';
   public $fillable = [
      'id_pengaduan',
      'tgl_tanggapan',
      '_id_tanggapan',
      'id_petugas'
   ];

   // protected $table = 'tanggapan';
   // // protected $primarykey = 'id';
   // protected $fillable = [
   //  'id_pengaduan', 
   //  'tgl_tanggapan', 
   //  'tanggapan', 
   //  'id_petugas' 
   // ];

   // public function pengaduan()
   // {
   //  return $this->hasOne('App\Models\Pengaduan', 'id', 'id_pengaduan');
   // }

   // public function petugas()
   // {
   //  return $this->hasOne('App\Models\Petugas', 'id', 'id_petugas');
   // }

   // public function pengaduans()
   // {
   //  return $this->belongsTo('App\Models\Pengaduan', 'id');
   // }
}
