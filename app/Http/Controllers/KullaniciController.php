<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{
    public function uyeol(){
        return view('kullanici.uyeol');
    }

    public function giris()
    {
        if (request()->isMethod('POST'))
        {
            $this->validate(request(), [
                'email' => 'required|email',
                'sifre' => 'required'
            ]);
            $credentials =
                [
                    'email' => request()->get('email'),
                    'password' => request()->get('sifre')
                ];
            if (auth()->attempt($credentials))
            {
                return redirect()->route('index');
            }
            else {
                return back()->withInput();
            }
        }
        return view('kullanici.giris');
    }


    public function kaydol($id = 0)
    {
        $this->validate(request(), [
            'adsoyad' => 'required',
            'email' => 'required|email'
        ]);
        $data = request()->only('adsoyad', 'email', 'telefon');
        if (request()->filled('sifre'))
        {
            $data['sifre'] = Hash::make(request('sifre'));
        }
        //$data['yonetici'] = request()->has('yonetici') ? 1 : 0;
        if ($id > 0)
        {
            $entry = Kullanici::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else
        {
            $entry  = Kullanici::create($data);
        }

        return redirect()->route('index');
    }

    public function cikis (){
        Auth()->logout();
        /*request()->session()->flush();
        request()->session()->regenerate();*/
        return redirect()->route('kullanici.giris');
    }
}
