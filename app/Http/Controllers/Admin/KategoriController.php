<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategoriler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        if (request()->filled('ustu')) {
            request()->flash();
            $ust_id = request('ustu');
            $list = Kategoriler::with('ust_kategori')->where('ustu', $ust_id)->get();
        } else {
            request()->flush();
            $list = Kategoriler::with('ust_kategori')->where('ustu', 0)->get();
        }

        $anakategoriler = Kategoriler::all();

        return view('admin.kategoriler.index', compact('list', 'anakategoriler'));
    }

    public function form($id = 0) {
        $item = new Kategoriler;
        if ($id > 0) {
            $item = Kategoriler::find($id);
        }
        $kategoriler = Kategoriler::all();
        return view('admin.kategoriler.form', compact('kategoriler', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('kategori', 'ustu');

        if ($id > 0) {
            $item = Kategoriler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Kategoriler::create($data);
        }

        return redirect()->route('admin.kategoriler.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Kategoriler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.kategoriler.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Kategoriler::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.kategoriler.index');
    }

    public function sil($id) {
        Kategoriler::destroy($id);
        return redirect()->route('admin.kategoriler.index');
    }
}
