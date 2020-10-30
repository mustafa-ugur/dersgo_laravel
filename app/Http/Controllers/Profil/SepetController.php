<?php

namespace App\Http\Controllers\Profil;

use App\Models\Dersnotlari;
use App\Models\Kullanici;
use App\Models\Sepet;
use App\Models\Sepeturun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SepetController extends Controller
{
    public function index() {
        $notlar = Dersnotlari::all();
        return view('profil.sepet.index', compact('notlar'));
    }

    public function ekle()
    {
        $urun = Dersnotlari::find(request('id'));
        $kullanici = Kullanici::find(request('satici_id'));
        $cartItem = Cart::add($urun->id, $urun->baslik, 1, $urun->fiyat);
        //$cartItem = Cart::add($urun->id, $urun->baslik, 1, $urun->satis_fiyat, ['resim' => $urun->resim]);
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            if (!isset($aktif_sepet_id))
            {
                $aktif_sepet = Sepet::create([
                    'uye_id' => auth()->id()
                ]);
                $aktif_sepet_id = $aktif_sepet->id;
                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }
            SepetUrun::updateOrCreate(
                ['sepet_id' => $aktif_sepet_id, 'urun_id' => $urun->id, 'satici_id' => $kullanici->id],
                ['adet' => 1, 'fiyat' => $urun->fiyat, 'durum' => 'Beklemede']
            );
        }
        return redirect()->back();
    }

    public function kaldir ($rowid)
    {
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);
            SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->delete();
        }
        Cart::remove($rowid);
        return redirect()->route('profil.sepet.index');
    }

    public function bosalt ()
    {
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            SepetUrun::where('sepet_id', $aktif_sepet_id)->delete();
        }
        Cart::destroy();
        return redirect()->route('profil.sepet.index');
    }

/*    public function guncelle($rowid)
    {
        if (auth()->check())
        {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);

            if (request('adet') == 0)
            {
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->where('urun_id', $cartItem->id)->delete();
            }
            else
            {
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->where('urun_id', $cartItem->id)->update(['adet' => request('adet')]);
            }
        }
        Cart::update($rowid, request('adet'));
        return response()->json(['success'=>true]);
    }*/

}
