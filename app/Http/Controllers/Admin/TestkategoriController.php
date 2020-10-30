<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategoriler;
use App\Models\Testkategori;
use App\Models\Testler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestkategoriController extends Controller
{
    public function index() {
        $list = Testkategori::all();
        return view('admin.test_kategori.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Testkategori;
        if ($id > 0) {
            $item = Testkategori::find($id);
        }
        $testler = Testkategori::all();
        $kategoriler = Kategoriler::all();
        return view('admin.test_kategori.form', compact('testler', 'item', 'kategoriler'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'kid');

        if ($id > 0) {
            $item = Testkategori::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Testkategori::create($data);
        }

        return redirect()->route('admin.test_kategori.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Testkategori::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.test_kategori.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Testkategori::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.test_kategori.index');
    }

    public function sil($id) {
        Testkategori::destroy($id);
        return redirect()->route('admin.test_kategori.index');
    }
}
