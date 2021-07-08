<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = [
      'kriteria',
      'bobot',
      'tipe'
    ];
    public function normalisasi(){
      return $this->hasMany('App\normalisasi');
    }
}
