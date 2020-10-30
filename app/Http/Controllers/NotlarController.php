<?php

namespace App\Http\Controllers;

use App\Models\Dersnotlari;
use App\Models\Kategoriler;
use App\Models\Kullanici;
use App\Models\ResimEkle;
use App\Models\Sss;
use App\Models\Yorumlar;
use Illuminate\Http\Request;

class NotlarController extends Controller
{
    public function index(){
        $notlar = Dersnotlari::all();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('ders_notlari.index', compact('notlar', 'kategoriler'));
    }

    public function detay($id = 0) {
        $item = new Dersnotlari;
        if ($id > 0) {
            $item = Dersnotlari::find($id);
        }
        $dosyalar = ResimEkle::where('data_id', $id)->get();
        $yorumlar = Yorumlar::where('ders_id', $id)->get();
        return view('ders_notlari.detay', compact('item', 'dosyalar', 'yorumlar'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('detay', 'ders_id', 'uye_id');
        $item = Yorumlar::create($data);
        return redirect()->back();
    }

    public function filtrele($id) {
        $notlar = Dersnotlari::where('kid', $id)->get();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('ders_notlari.index', compact('notlar', 'kategoriler'));
    }
}
