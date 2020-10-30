<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kullanici;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{
    public function index() {
        $list = Kullanici::where('yonetici', 0)->get();
        return view('admin.kullanici.index', compact('list'));
    }

    public function form($id = 0)
    {
        $item = new Kullanici;
        if ($id > 0) {
            $item = Kullanici::find($id);
        }

        return view('admin.kullanici.form', compact('item'));
    }

    public function kaydet($id = 0)
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

        return redirect()->route('admin.kullanici.index');
    }


    public function aktif($id) {
        $data = ['aktif' => 1];
        if ($id > 0) {
            $item = Kullanici::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.kullanici.index');
    }

    public function pasif($id) {
        $data = ['aktif' => 0];
        if ($id > 0) {
            $item = Kullanici::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        return redirect()->route('admin.kullanici.index');
    }


    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()->route('admin.kullanici.index');
    }

    public function giris() {
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'email' => 'required|email',
                'sifre' => 'required'
            ]);
            $credentials = [
                'email' => request()->get('email'),
                'password' => request()->get('sifre'),
                'yonetici' => 1
            ];
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.index');
            }
            else {
                return back()->withInput();
            }
        }
        return view('admin.giris');
    }

    public function cikis() {
        Auth::guard('admin')->logout();
        /*request()->session()->flush();
        request()->session()->regenerate();*/
        return redirect()->route('admin.giris');
    }
}
