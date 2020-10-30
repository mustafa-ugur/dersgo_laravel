@extends('partial.master')
@section('title', 'Anasayfa')
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
                <p>Bu Kısımdan Satın Aldıklarınıza Ulaşabilirsiniz</p>
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
                        <h3> Satın Aldıklarım </h3>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Tutar</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                        @foreach($siparisler as $siparis)
                            @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                                <tr>
                                    <th scope="row"> {{ $i }} </th>
                                    <td>
                                        {{ $sepet_urun->urun->baslik }}
                                    </td>
                                    <td>{{ $sepet_urun->urun->fiyat }} ₺ </td>
                                    <td><a href="{{ route('ders_notlari.detay', $sepet_urun->urun->id) }}" class="btn btn-outline-danger"> Derse Git </a> </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
