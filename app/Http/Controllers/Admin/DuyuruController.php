<?php

namespace App\Http\Controllers\Admin;

use App\Models\Duyurular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuyuruController extends Controller
{
    public function index() {
        $list = Duyurular::all();
        return view('admin.duyurular.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Duyurular;
        if ($id > 0) {
            $item = Duyurular::find($id);
        }
        $duyurular = Duyurular::all();
        return view('admin.duyurular.form', compact('duyurular', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'ozet', 'detay');

        if ($id > 0) {
            $item = Duyurular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Duyurular::create($data);
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
                $resim->move('upload/duyurular', $dosya_adi);

                Duyurular::updateOrCreate(
                    ['id' => $item->id],
                    ['resim' => $dosya_adi]

                );
            }

            //$resim = request()->resim;
            //$resim->extension(); uzantı çeker
            //$resim->getClientOriginalName(); dosyanın orjinal adı
            //$resim->hashName(); rast gele isim verme
        }

        return redirect()->route('admin.duyurular.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Duyurular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.duyurular.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Duyurular::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.duyurular.index');
    }

    public function sil($id) {
        Duyurular::destroy($id);
        return redirect()->route('admin.duyurular.index');
    }
}
