<?php

namespace App\Services;

use App\Models\KomponenKriteria;
use App\Models\IndikatorKunci;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;


class WsmService
{
    public static function nilaiJawaban($huruf){
        return match($huruf){
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            default => 0
        };
    }

    public static function hitungKomponen($komponen_id, $user_id)
    {
        $komponen = KomponenKriteria::findOrFail($komponen_id);
        $indikator = IndikatorKunci::where('komponen_id',$komponen_id)->get();

        $totalIndikator = $indikator->count();
        if($totalIndikator == 0) return 0;

        $max = $totalIndikator * 4;
        $aktual = 0;

        foreach($indikator as $i){
            $jawab = Penilaian::where('indikator_id',$i->id)
                ->where('user_id',$user_id)
                ->first();

            if($jawab){
                $aktual += self::nilaiJawaban($jawab->jawaban);
            }
        }

        $normalisasi = $aktual / $max;

        // bobot kamu adalah NILAI RILL (bukan persen)
        return round($normalisasi * $komponen->bobot, 2);
    }

    public static function hitungTotal($user_id)
    {
        $total = 0;
        foreach(KomponenKriteria::all() as $k){
            $total += self::hitungKomponen($k->id, $user_id);
        }
        return round($total,2);
    }

    public static function hitungPerKomponen($user_id)
    {
    $result = [];

    $komponen = KomponenKriteria::all();

    foreach($komponen as $k){

        $indikator = IndikatorKunci::where('komponen_id',$k->id)->pluck('id');

        $nilai = Penilaian::whereIn('indikator_id',$indikator)
                ->where('user_id',$user_id)
                ->sum(DB::raw("
                    CASE jawaban
                        WHEN 'A' THEN 4
                        WHEN 'B' THEN 3
                        WHEN 'C' THEN 2
                        WHEN 'D' THEN 1
                    END
                "));

        $maks = $indikator->count() * 4;

        $skor = $maks>0 ? ($nilai / $maks) * $k->bobot : 0;

        $result[] = [
            'nama'  => $k->nama,
            'bobot' => $k->bobot,
            'skor'  => round($skor,2)
        ];
    }

    return $result;
    }

    public static function indikatorBermasalah($user_id)
{
    return Penilaian::join('indikator','indikator.id','=','penilaian.indikator_id')
        ->join('komponen_kriteria','komponen_kriteria.id','=','penilaian.komponen_id')
        ->where('penilaian.user_id',$user_id)
        ->where('penilaian.jawaban','!=','A') // selain A
        ->select(
            'komponen_kriteria.nama as komponen',
            'indikator.indikator',
            'penilaian.jawaban'
        )
        ->orderBy('komponen_kriteria.nama')
        ->get();
}
}
