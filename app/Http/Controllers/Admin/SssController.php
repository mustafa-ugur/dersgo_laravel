<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategoriler;
use App\Models\sss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SssController extends Controller
{
    public function index() {
        $list = Sss::all();
        return view('admin.sss.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Sss;
        if ($id > 0) {
            $item = Sss::find($id);
        }
        $sss = Sss::all();
        $kategoriler = Kategoriler::all();
        return view('admin.sss.form', compact('sss', 'item', 'kategoriler'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'detay', 'kid');

        if ($id > 0) {
            $item = Sss::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Sss::create($data);
        }

        return redirect()->route('admin.sss.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Sss::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sss.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Sss::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sss.index');
    }

    public function sil($id) {
        Sss::destroy($id);
        return redirect()->route('admin.sss.index');
    }
}
