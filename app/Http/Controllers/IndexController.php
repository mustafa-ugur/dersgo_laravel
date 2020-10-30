<?php

namespace App\Http\Controllers;

use App\Models\Haberler;
use App\Models\Istatistik;
use App\Models\Kategoriler;
use App\Models\Sorular;
use App\Models\Sss;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        //$kategoriler = Kategoriler::all();
        $sorular = Sorular::all();
        $istatistik = Istatistik::all();
        $sss = Sss::all();
        $haberler = Haberler::paginate('3');
        return view('index', compact('kategoriler', 'sorular', 'istatistik', 'sss', 'haberler'));
    }
}
