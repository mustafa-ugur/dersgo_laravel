<?php

namespace App\Http\Controllers\Admin;

use App\Models\Istatistik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IstatistikController extends Controller
{
    public function index() {
        $list = Istatistik::all();
        return view('admin.istatistik.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Istatistik;
        if ($id > 0) {
            $item = Istatistik::find($id);
        }
        $istatistik = Istatistik::all();
        return view('admin.istatistik.form', compact('istatistik', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'sayi', 'icon');

        if ($id > 0) {
            $item = Istatistik::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Istatistik::create($data);
        }


        return redirect()->route('admin.istatistik.index');
    }
}
