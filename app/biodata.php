<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    protected $table = 'biodata';
    protected $fillable = [
      'user_id',
      'umur',
      'jns_kelamin',
      'alamat',
      'tmp_lahir',
      'tgl_lahir',
      'kecamatan',
      'kabupaten',
      'nama_ayah',
      'nama_ibu',
      'no_hp',
      'pekerjaan_ortu'
    ];
    public function user(){
      return $this->belongsTo('App\user');
    }
}
