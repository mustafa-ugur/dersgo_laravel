<?php

namespace App\Http\Controllers;

use App\Models\Kategoriler;
use App\Models\Sss;
use Illuminate\Http\Request;

class SssController extends Controller
{
    public function index(){
        $sss = Sss::all();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('sss.index', compact('sss', 'kategoriler'));
    }

    public function filtrele($id) {
        $sss = Sss::where('kid', $id)->get();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('sss.index', compact('sss', 'kategoriler'));
    }
}
