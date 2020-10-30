<?php

namespace App\Http\Controllers;

use App\Models\Cevaplar;
use App\Models\Kullanici;
use App\Models\Sorular;
use Illuminate\Http\Request;

class SorularController extends Controller
{
    public function index(){
        $sorular = Sorular::all();
        return view('sorular.index');
    }

    public function detay($id = 0) {
        $item = new Sorular;
        if ($id > 0) {
            $item = Sorular::find($id);
        }
        $cevaplar = Cevaplar::where('soru_id', $id)->get();
        return view('sorular.form', compact('cevaplar', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('detay', 'soru_id', 'uye_id');
        $item = Cevaplar::create($data);
        return redirect()->back();
    }
}
