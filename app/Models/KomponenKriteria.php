<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomponenKriteria extends Model
{
    protected $table = 'komponen_kriteria';
    protected $fillable = ['nama','bobot','keterangan'];
}
