<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    protected $table = 'subkriteria';
    protected $fillable = [
      'kriteria_id',
      'subkriteria',
      'bobot'
    ];
    public function normalisasi(){
      return $this->hasMany('App\normalisasi');
    }
}
