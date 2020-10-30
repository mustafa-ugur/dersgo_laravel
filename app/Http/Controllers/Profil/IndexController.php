<?php

namespace App\Http\Controllers\Profil;

use App\Models\Kullanici;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index() {
        return view('profil.index', compact('sifre', 'decrypted'));
    }

    public function kaydet()
    {
        $this->validate(request(), [
            'adsoyad' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('adsoyad', 'email', 'adres', 'telefon');
        if (request()->filled('sifre'))
        {
            $data['sifre'] = Hash::make(request('sifre'));
        }
        if (Auth()->id() > 0)
        {
            $entry = Kullanici::where('id', Auth()->id())->firstOrFail();
            $entry->update($data);
        }

        else
        {
            $entry  = Kullanici::create($data);
        }

        if (request()->hasFile('resim'))
        {
            $this->validate(request(), [
                'resim' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $resim = request()->file('resim');

            $dosya_adi = $entry->id . "-" . time() . "." . $resim->extension();

            if ($resim->isValid())
            {
                $resim->move('upload/profil', $dosya_adi);

                Kullanici::updateOrCreate(
                    ['id' => $entry->id],
                    ['resim' => $dosya_adi]

                );
            }

            //$resim = request()->resim;
            //$resim->extension(); uzantı çeker
            //$resim->getClientOriginalName(); dosyanın orjinal adı
            //$resim->hashName(); rast gele isim verme
        }
        return redirect()->route('profil.index');
    }

}
