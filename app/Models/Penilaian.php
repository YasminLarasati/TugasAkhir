<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $fillable = [
        'komponen_id',
        'indikator_id',
        'user_id',
        'jawaban'
    ];

//     public function skor()
// {
//     return match($this->jawaban){
//         'A' => 4,
//         'B' => 3,
//         'C' => 2,
//         'D' => 1,
//         default => 0
//     };
// }

}
