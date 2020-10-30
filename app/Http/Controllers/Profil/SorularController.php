<?php

namespace App\Http\Controllers\Profil;

use App\Models\Istatistik;
use App\Models\Kategoriler;
use App\Models\Sorular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SorularController extends Controller
{
    public function index(){
        $kategori = Kategoriler::with('ust_kategori')->get();
        $sorular = Sorular::with('kategoriler')->where('uye_id', Auth::user()->id)->get();
        return view('profil.sorular.index', compact('sorular', 'kategori'));
    }

    public function form($id = 0) {
        $item = new Sorular;
        if ($id > 0) {
            $item = Sorular::find($id);
        }
        $sorular = Sorular::all();
        $kategoriler = Kategoriler::with('ust_kategori')->get();
        return view('profil.sorular.form', compact('sorular', 'item', 'kategoriler'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'detay', 'kid', 'uye_id');

        if ($id > 0) {
            $item = Sorular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Sorular::create($data);
        }

        return redirect()->route('profil.sorular.index');
    }
}
