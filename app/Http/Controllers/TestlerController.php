<?php

namespace App\Http\Controllers;
use App\Models\Kategoriler;
use App\Models\Testcevaplari;
use App\Models\Testkategori;
use App\Models\Testler;
use Illuminate\Http\Request;

class TestlerController extends Controller
{
    public function index(){
        $testler = Testkategori::where('aktif', 1)->get();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('testler.index', compact('testler', 'kategoriler'));
    }

    public function test_sonuc($id) {
        $cevaplar = Testcevaplari::where('id', $id)->get();
        $kategori = Testkategori::find($id);
        return view('testler.test_sonuc', compact('cevaplar', 'kategori'));
    }

    public function test($id = 0) {
        $item = new Testkategori;
        if ($id > 0) {
            $item = Testkategori::find($id);
        }
        $testler = Testler::where('kid', $id)->get();
        return view('testler.test', compact('item', 'testler'));
    }

    public function kaydet(Request $request) {
        $input=$request->all();
        //$images=array();
        Testcevaplari::create( [
            'cevap'=>   implode(',', $input['cevap']),
            'test_id'=> $input['test_id'],
            'uye_id' => auth()->user()->id,
        ]);
        return redirect()->route('profil.testler.index');
    }

    public function filtrele($id) {
        $testler = Testkategori::where('kid', $id)->where('aktif', 1)->get();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('testler.index', compact('testler', 'kategoriler'));
    }
}
