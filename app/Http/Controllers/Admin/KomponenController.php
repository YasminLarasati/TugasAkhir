<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KomponenKriteria;

class KomponenController extends Controller
{
    public function index(){
        $data = KomponenKriteria::all();
        return view('admin.komponen', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
            'bobot'=>'required|integer|min:1|max:100'
        ]);

        KomponenKriteria::create($request->all());
        return back()->with('success','Komponen ditambahkan');
    }

    public function destroy($id){
        KomponenKriteria::destroy($id);
        return back();
    }

    public function edit($id){
    $d = KomponenKriteria::find($id);
    return view('admin.komponen_edit', compact('d'));
}

    // public function update(Request $request, $id){
    // KomponenKriteria::find($id)->update($request->all());
    // return redirect('/akreditasi/admin/komponen')->with('success','Komponen diperbarui');

    public function update(Request $request,$id){
    KomponenKriteria::find($id)->update($request->all());
    return back()->with('success','Komponen berhasil diupdate');
}

}


