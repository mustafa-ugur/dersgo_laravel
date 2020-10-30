@extends('partial.master')
@section('title', 'Sepet')
@section('content')

    <style>
        .btnT {
            width: 49%;
            margin: 0px 5px;
        }
    </style>
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>SEPET</h1>
                <p>Sepetiniz</p>
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


    <section class="sss">
        <div class="container">
            @if (count(Cart::content())>0)
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <th>Kaldır</th>
                        <th>Ders Adı</th>
                        <th>Fiyat</th>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $urunCartItem)
                            <tr>
                                <td>
                                    <form action="{{ route('profil.sepet.kaldir', $urunCartItem->rowId ) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a style="font-weight: 900; color: #000;" href="{{route('ders_notlari.detay', $urunCartItem->id)}}">{{ $urunCartItem->name }} <i class="fa fa-link"></i> </a>
                                </td>
                                <td>
                                    <span>{{ $urunCartItem->price }} ₺</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger">Sepetinizde Boş !</div>
                </div>
            @endif
                <hr>
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2" align="right"> Toplam Ödenecek Tutar = </td>
                            <td colspan="2" align="right" style="font-weight: 900;">{{ Cart::subtotal() }} ₺</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{ route('profil.sepet.bosalt') }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger btnT btn2 update-btn"> SEPETİ BOŞALT <i class="fa fa-trash"></i> </button>
            </form>
            <button class="btn btn-success btnT btn2 update-btn"> ÖDEME YAP </button>
        </div>
    </section>

@endsection
