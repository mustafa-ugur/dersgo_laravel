<?php

namespace App\Http\Controllers\Profil;

use App\Models\Dersnotlari;
use App\Models\Kategoriler;
use App\Models\ResimEkle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotlarController extends Controller
{
    public function index() {
        $kategori = Kategoriler::with('ust_kategori')->get();
        $notlar = Dersnotlari::with('kategoriler')->where('uye_id', Auth::user()->id)->get();
        return view('profil.notlar.index', compact('notlar', 'kategori'));
    }

    public function form($id = 0) {
        $item = new Dersnotlari;
        if ($id > 0) {
            $item = Dersnotlari::find($id);
        }
        $notlar = Dersnotlari::all();
        $kategoriler = Kategoriler::with('alt_kategoriler')->whereRaw('ustu = 0')->get();
        return view('profil.notlar.form', compact('notlar', 'item', 'kategoriler'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'ana_fiyat', 'fiyat', 'ozet', 'detay', 'uye_id', 'kid');

        if ($id > 0) {
            $item = Dersnotlari::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Dersnotlari::create($data);
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
                $resim->move('upload/notlar', $dosya_adi);

                Dersnotlari::updateOrCreate(
                    ['id' => $item->id],
                    ['resim' => $dosya_adi]

                );
            }
        }
    }

    public function sebep($id) {
        $data = request()->only('sebep', 'aktif');
        $item = Dersnotlari::where('id', $id)->firstOrFail();
        $item->update($data);
        return redirect()->route('profil.notlar.index');
    }

    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Dersnotlari::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('profil.notlar.index');
    }

    //Dökümantasyon Ekleme Başlangıç
    public function DosyaEkle($id = 0) {
        $notlar = Dersnotlari::whereId($id)->firstOrFail();
        $resimler = ResimEkle::where('data_id', $id)->get();
        return view('profil.notlar.dosya', compact('resimler', 'notlar'));
    }

    public function Dosyakaydet(Request $request) {
        $input=$request->all();
        $images=array();
        if($files=$request->file('resim')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('upload/notlar',$name);
                ResimEkle::insert( [
                    'resim'=>  $name,
                    'data_id' =>$input['data_id'],
                ]);
            }
        }
        return redirect()->back();
    }
    //Dökümantasyon Ekleme Bitiş

}
