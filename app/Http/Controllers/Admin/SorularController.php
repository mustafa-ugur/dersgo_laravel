<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cevaplar;
use App\Models\Sorular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SorularController extends Controller
{
    public function index() {
        $list = Sorular::all();
        return view('admin.sorular.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Sorular;
        if ($id > 0) {
            $item = Sorular::find($id);
        }
        $sorular = Sorular::all();
        $cevaplar = Cevaplar::where('soru_id', $id)->get();
        return view('admin.sorular.form', compact('sorular', 'item', 'cevaplar'));
    }


    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Sorular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sorular.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Sorular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sorular.index');
    }
}
