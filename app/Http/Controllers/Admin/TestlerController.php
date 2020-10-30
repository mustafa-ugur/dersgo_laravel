<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategoriler;
use App\Models\Testkategori;
use App\Models\Testler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestlerController extends Controller
{
    public function index() {
        $list = Testler::all();
        return view('admin.testler.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Testler;
        if ($id > 0) {
            $item = Testler::find($id);
        }
        $testler = Testler::all();
        $kategoriler = Testkategori::all();
        return view('admin.testler.form', compact('testler', 'item', 'kategoriler'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('soru', 'puan','a','b','c','d','e','kid');

        if ($id > 0) {
            $item = Testler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Testler::create($data);
        }

        return redirect()->route('admin.testler.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Testler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.testler.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Testler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.testler.index');
    }

    public function sil($id) {
        Testler::destroy($id);
        return redirect()->route('admin.testler.index');
    }

}
