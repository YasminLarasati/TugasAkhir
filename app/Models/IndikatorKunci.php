<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndikatorKunci extends Model
{
    protected $table = 'indikator';
    protected $fillable = ['komponen_id','indikator','opsi_a','opsi_b','opsi_c','opsi_d'];

    public function komponen(){
        return $this->belongsTo(KomponenKriteria::class,'komponen_id');
    }
}
