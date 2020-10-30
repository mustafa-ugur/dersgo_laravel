<?php

namespace App\Http\Controllers\Profil;

use App\Models\Sepeturun;
use App\Models\Siparis;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OdemeController extends Controller
{
    public function index(){
        $sepet_id = session('aktif_sepet_id');
        //$sepeturun = DB::select('SELECT * FROM sepet_urun WHERE sepet_id ='.$sepet_id);
        $sepeturun = SepetUrun::where('sepet_id', $sepet_id)->firstOrFail();
        return view('profil.odeme.index', compact('sepeturun'));
    }
    public function odemeyap()
    {
        $siparis = request()->all();
        $siparis['sepet_id'] = session('aktif_sepet_id');
        $siparis['banka'] = "Garanti";
        $siparis['taksit_sayisi'] = 1;
        $siparis['durum'] = "Siparişiniz Alındı";
        //$siparis['satici_id'] = $sepeturun->satici_id;
        //$siparis['siparis_tutari'] = Cart::subtotal();
        Siparis::create($siparis);
        Cart::destroy();
        session()->forget('aktif_sepet_id');

        return redirect()->route('index');
    }
}
