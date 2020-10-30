@extends('partial.master')
@section('title', 'Sorularım | Dersgo')
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
                        <h3> Sorduğum Sorular </h3>
                        <a href="{{ route('profil.sorular.ekle') }}" class="btn btn-ekle"> Soru Ekle </a>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Soru</th>
                            <th scope="col">Kategori</th>
                            <th scope="col"> Durum </th>
                            <th scope="col"> İşlemler </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sorular as $soru)
                        <tr>
                            <th scope="row">{{ $soru->id }}</th>
                            <td> {{ $soru->baslik }} </td>
                            <td>@foreach($kategori as $kat)
                                    @if($soru->kategoriler->ustu == $kat->id) {{ $kat->kategori }} @endif
                                @endforeach  >
                                {{ $soru->kategoriler->kategori }}
                                 </td>
                            <td>
                                @if($soru->aktif == 0)
                                    <div style="font-size: 13px;" class="alert alert-danger"> Onay Bekleniyor </div>
                                @endif
                                @if($soru->aktif == 1)
                                    <div style="font-size: 10px;" class="alert alert-success"> Yayında </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sorular.detay', $soru->id) }}" class="btn btn-duzenle"> Soruya Git </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
