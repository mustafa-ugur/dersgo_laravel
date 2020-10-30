<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yazilar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YazilarController extends Controller
{
    public function index() {
        $list = Yazilar::all();
        return view('admin.sayfa.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Yazilar;
        if ($id > 0) {
            $item = Yazilar::find($id);
        }
        $Yazilar = Yazilar::all();
        return view('admin.sayfa.form', compact('Yazilar', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'ozet', 'detay');

        if ($id > 0) {
            $item = Yazilar::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Yazilar::create($data);
        }

        if (request()->hasFile('resim'))
        {
            $this->validate(request(), [
                'resim' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $resim = request()->file('resim');

            $dosya_adi = $item->id . "-" . time() . "." . $resim->extension();

            if ($resim->isValid())
            {
                $resim->move('upload/sayfa', $dosya_adi);

                Yazilar::updateOrCreate(
                    ['id' => $item->id],
                    ['resim' => $dosya_adi]

                );
            }

            //$resim = request()->resim;
            //$resim->extension(); uzantı çeker
            //$resim->getClientOriginalName(); dosyanın orjinal adı
            //$resim->hashName(); rast gele isim verme
        }

        return redirect()->route('admin.sayfa.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Yazilar::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sayfa.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Yazilar::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.sayfa.index');
    }

    public function sil($id) {
        Yazilar::destroy($id);
        return redirect()->route('admin.sayfa.index');
    }
}
