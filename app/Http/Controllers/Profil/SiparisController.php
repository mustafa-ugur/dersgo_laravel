<?php

namespace App\Http\Controllers\Profil;

use App\Models\Dersnotlari;
use App\Models\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiparisController extends Controller
{
    public function index()
    {
        $siparisler = Siparis::with('sepet.sepet_urunler.urun')
            ->whereHas('sepet', function($query) {
                $query->where('uye_id', auth()->id());
            })->get();
        $notlar = Dersnotlari::all();
        return view('profil.satin_aldiklarim.index', compact('siparisler', 'notlar'));
    }

    public function satislar()
    {
        $siparisler = Siparis::where('satici_id', auth()->id())->get();
        $notlar = Dersnotlari::all();
        return view('profil.satislarim.index', compact('siparisler', 'notlar'));
    }

}
