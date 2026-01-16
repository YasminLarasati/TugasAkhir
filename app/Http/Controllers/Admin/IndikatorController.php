<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KomponenKriteria;
use App\Models\IndikatorKunci;

class IndikatorController extends Controller
{
    public function index($komponen_id)
    {
        $komponen = KomponenKriteria::findOrFail($komponen_id);
        $indikator = IndikatorKunci::where('komponen_id', $komponen_id)->get();

        return view('admin.indikator', compact('komponen','indikator'));
    }

    public function store(Request $request, $komponen_id)
    {
        $request->validate([
            'indikator'=>'required',
            'opsi_a'=>'required',
            'opsi_b'=>'required',
            'opsi_c'=>'required',
            'opsi_d'=>'required',
        ]);

        IndikatorKunci::create([
            'komponen_id'=>$komponen_id,
            'indikator'=>$request->indikator,
            'opsi_a'=>$request->opsi_a,
            'opsi_b'=>$request->opsi_b,
            'opsi_c'=>$request->opsi_c,
            'opsi_d'=>$request->opsi_d,
        ]);

        return back()->with('success','Indikator ditambahkan');

    }

    public function destroy($id)
    {
        IndikatorKunci::destroy($id);
        return back();
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'indikator' => 'required',
        'opsi_a' => 'required',
        'opsi_b' => 'required',
        'opsi_c' => 'required',
        'opsi_d' => 'required',
    ]);

    \App\Models\IndikatorKunci::where('id',$id)->update([
        'indikator' => $request->indikator,
        'opsi_a' => $request->opsi_a,
        'opsi_b' => $request->opsi_b,
        'opsi_c' => $request->opsi_c,
        'opsi_d' => $request->opsi_d,
    ]);

    return back()->with('success','Indikator berhasil diperbarui');
}

}
