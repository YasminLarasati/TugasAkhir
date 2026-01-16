<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KomponenKriteria;
use App\Models\IndikatorKunci;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use App\Services\WsmService;
use App\Models\User;


class DashboardController extends Controller
{

public function index()
{
    return redirect('/kepala/dashboard');
}

public function komponen()
    {
        $komponen = KomponenKriteria::all();
        return view('tim.komponen', compact('komponen'));
    }

    public function indikator($komponen_id)
{
    $komponen  = KomponenKriteria::findOrFail($komponen_id);
    $indikator = IndikatorKunci::where('komponen_id',$komponen_id)->get();

    return view('tim.indikator', compact('indikator','komponen'));
}

    public function simpan(Request $request)
    {
        foreach($request->jawaban as $indikator_id=>$jawaban){
            Penilaian::updateOrCreate(
                [
                'indikator_id' => $indikator_id,
                'user_id' => Auth::id()
            ],
            [
                'komponen_id'  => $request->komponen_id,
                'jawaban'      => $jawaban
            ]
            );
        }
        return back()->with('success','Nilai berhasil disimpan');
    }

    public function step($komponen_id, $no)
    {
        $list = IndikatorKunci::where('komponen_id',$komponen_id)
            ->orderBy('id')
            ->get()
            ->values();   

        $total = $list->count();

        if($list->count() == 0){
            return redirect('/tim/komponen')->with('error','Komponen ini belum punya indikator');
        }

        if($no < 1) $no = 1;
        if($no > $total){
        return redirect('/tim/komponen')->with('success','Penilaian selesai');
        }

        $indikator = $list[$no-1];

        $jawaban = Penilaian::where('indikator_id',$indikator->id)
        ->where('user_id', auth()->id())
        ->first();

        return view('tim.step', compact('indikator','komponen_id','no','total','jawaban'));

        // return view('tim.step', [
        //     'indikator' => $indikator,
        //     'komponen_id' => $komponen_id,
        //     'no' => $no,
        //     'total' => $list->count()
        // ]);
    }

    public function jawabStep(Request $request)
    {
        Penilaian::updateOrCreate(
            [
                'indikator_id' => $request->indikator_id,
                'user_id' => Auth::id()
            ],
            [
                'komponen_id' => $request->komponen_id,
                'jawaban' => $request->jawaban
            ]
        );

    // hitung total indikator komponen ini
    $total = IndikatorKunci::where('komponen_id',$request->komponen_id)->count();

    // jika masih ada indikator berikutnya ➜ NEXT
    if($request->no < $total){
        return redirect("/tim/indikator/$request->komponen_id/".($request->no+1));
    }

    // jika sudah terakhir ➜ FINISH ➜ balik ke komponen
    return redirect('/tim/komponen')->with('success','Penilaian komponen selesai');
}
    public function rekap()
    {
        $user_id = auth()->id();

        $total = WsmService::hitungTotal($user_id);
        $detail = WsmService::hitungPerKomponen($user_id);

        return view('kepala.rekap', compact('total','detail'));
    }

    public function laporan()
    {
    $user_id = auth()->id();
    $data = WsmService::indikatorBermasalah($user_id);
    return view('kepala.laporan', compact('data'));
    }
}
