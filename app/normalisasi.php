<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class normalisasi extends Model
{
    protected $table = 'normalisasi';
    protected $fillable = [
      'kriteria_id',
      'user_id',
      'subkriteria_id'
    ];
    public function subkriteria(){
      return $this->belongsTo('App\subkriteria');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function kriteria(){
      return $this->belongsTo('App\kriteria');
    }
}
