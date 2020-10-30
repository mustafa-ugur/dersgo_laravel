@extends('partial.master')
@section('title', 'Ders Notlarim | Dersgo')
@section('content')

    <style>
        .table .thead-dark th {
            color: #fff;
            background-color: #7a1878;
            border-color: #7a1878;
        }

    </style>

    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>{{ Auth::user()->adsoyad }}</h1>
                <p>Bu Kısımdan Sorduğunuz Sorulara Ulaşabilirsiniz</p>
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


    <section class="sss_detay altContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="iletisimBaslik">
                        <h3> Notlarım </h3>
                        <a href="" class="btn btn-ekle"> Ders Notu Ekle </a>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                    @foreach($notlar as $d_not)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $d_not->baslik }}</td>
                            <td>@foreach($kategori as $kat)
                                    @if($d_not->kategoriler->ustu == $kat->id) {{ $kat->kategori }} @endif
                                @endforeach  >
                                {{ $d_not->kategoriler->kategori }}
                            </td>
                            <td>
                                <a href="{{ route('profil.notlar.duzenle', $d_not->id) }}" class="btn btn-duzenle" style="font-size: 13px;padding: 7px;"> Düzenle </a>
                                <a href="{{ route('profil.notlar.dosya', $d_not->id) }}" class="btn btn-duzenle" style="font-size: 13px;padding: 7px;"> Dökümantasyon Ekle </a>
                                @if($d_not->aktif == 1)
                                <a href="#{{ $d_not->id }}" class="btn btn-duzenle open-dialog" style="font-size: 13px;padding: 7px;"> Yayından Kaldır </a>
                                @endif
                                @if($d_not->aktif == 0)
                                    <a href="{{ route('profil.notlar.aktif', $d_not->id) }}" class="btn btn-duzenle" style="font-size: 13px;padding: 7px;"> Yayına Aç </a>
                                @endif
                            </td>
                        </tr>
                        <div id="{{ $d_not->id }}" style="display: none; width: 70%;">
                            <form id="pasif_et" action="{{ route('profil.notlar.sebep', $d_not->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="aktif" value="0">
                                <label for=""> Yayında Kaldırma Sebebinizi Yazınız </label>
                                <input type="text" name="sebep" class="form-control" placeholder="Yayından Kaldırma Sebebinizi Yazınız..." required>
                                <button class="btn btn-duzenle"> Gönder </button>
                            </form>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
