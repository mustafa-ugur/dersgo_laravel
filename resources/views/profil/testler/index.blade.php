@extends('partial.master')
@section('title', 'Testler')
@section('content')
<section class="ustBanner">
    <div class="container">
        <div class="text">
            <h1>{{ Auth::user()->adsoyad }}</h1>
            <p>Bu Kısımdan Girdiğiniz Testlere Ulaşabilirsiniz</p>
        </div>
    </div>
</section>

<section class="altMenu">
    <div class="container">
        <ul>
            <li> <a href="{{ route('profil.index') }}"> Bilgilerim <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('profil.testler.index') }}"> Testlerim <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('profil.sorular.index') }}"> Sorularım <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('profil.notlar.index') }}"> Notlarım <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('profil.satislarim.index') }}"> Satışlarım <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('profil.satin_aldiklarim.index') }}"> Satın Aldıklarım <i class="fa fa-angle-right"></i> </a> </li>
            <li> <a href="{{ route('kullanici.cikis') }}" class="cikisYap"> Çıkış Yap <i class="fa fa-sign-out"></i> </a> </li>
        </ul>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>Test</th>
                <th>Doğru</th>
                <th>Yanlış</th>
                <th>Puan</th>
                <th>Harf</th>
                </thead>
                <tbody>

                            @php
                                $testler = \Illuminate\Support\Facades\DB::select('SELECT * FROM test_cevaplari WHERE uye_id = '. auth()->user()->id);
                                $i = 1;
                                foreach ($testler as $test) {
                                $test_id = $test->test_id;
                                $testler2 = \Illuminate\Support\Facades\DB::select('SELECT * FROM test_kategori WHERE id = '. $test_id);
                                foreach ($testler2 as $test2) {
                                $sonuc = array();
                                $puanlar = array();
                                $yanlis = array();
                                $dogru = array();
                                $puan = (int)0;
                                $dogru = \Illuminate\Support\Facades\DB::select('SELECT * FROM testler WHERE kid = '. $test_id);
                                foreach ($dogru as $key => $d) {
                                    $dogru[$key]=$d->dogru;
                                    $puanlar[$key]=$d->puan;
                                }
                                $cevaplar = \Illuminate\Support\Facades\DB::selectOne('SELECT * FROM test_cevaplari WHERE test_id = '. $test_id .' and uye_id = '. auth()->user()->id);
                                $etiketler = $cevaplar->cevap;
                                $parcala = explode(",", $etiketler);
                                foreach ($parcala as $key => $etiket) {
                                    if ($etiket == $dogru[$key]) {
                                        $sonuc[$key] = $etiket;
                                        $puan += $puanlar[$key];
                                    } else {
                                        $yanlis[$key] = $etiket;
                                    }
                                }

                              if ($puan >= 0 && $puan <=29) {
                                 $harf = "FF";
                              }
                              elseif ($puan >= 30 && $puan <= 59) {
                                $harf = "DD";
                              }

                              elseif ($puan >= 60 && $puan <= 67) {
                                $harf = "CC";
                              }

                              elseif ($puan >= 68 && $puan <= 75) {
                                $harf = "CB";
                              }

                              elseif ($puan >= 76 && $puan <=83) {
                                $harf = "BB";
                              }

                              elseif ($puan >= 84 && $puan <=91) {
                                $harf = "BA";
                              }

                              elseif ($puan >= 92 && $puan <=100) {
                                $harf = "AA";
                              }
                               echo '
                                    <tr>
                                    <td> '.$i.' </td>
                                    <td> '.$test2->baslik.' </td>
                                    <td> '.count($sonuc).'</td>
                                    <td> '.count($yanlis).'</td>
                                    <td> '.$puan.'</td>
                                    <td> '.$harf.'</td>
                                </tr>
                                ';
                                    $i++; } }
                            @endphp
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
