<?php

namespace App\Http\Controllers\Profil;

use App\Models\Testcevaplari;
use App\Models\Testkategori;
use App\Models\Testler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestlerController extends Controller
{
    public function index() {
        $testler = Testler::all();
        $test_cevaplari = Testcevaplari::where('uye_id', Auth::user()->id)->get();
        $test_kategori = Testkategori::all();
        return view('profil.testler.index', compact('testler', 'test_cevaplari', 'test_kategori'));
    }

}
