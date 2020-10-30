@extends('partial.master')
@section('title', 'Soru Cevap | Dersgo')
@section('content')
<section class="ustBanner">
    <div class="container">
        <div class="text">
            <h1>Soru Cevap</h1>
            <p>Bu Kısımdan Sorduğunuz Sorulara Ulaşabilirsiniz</p>
        </div>
    </div>
</section>
<section class="test_detay">
    <div class="container">
        <div class="col-md-12">
            <div class="iletisimBaslik">
                <h3> Soru : {{ $item->baslik }}</h3>
            </div>
            <div class="sorular">
                <span> Üye Adı :  {{ $item->uye_adi->adsoyad }} </span>
                <div class="icerik">
                    <h3> {{ $item->baslik }} </h3>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="iletisimBaslik">
                <h3> Cevaplar : </h3>
            </div>
        </div>
        @foreach($cevaplar as $cevap)
                <div class="col-md-12">
                    <div class="sorular">
                        <span style="width: 50%;float: left;"> Cevaplayan : {{ $cevap->uye_adi->adsoyad }} </span>
                        <span style="width: 50%;text-align: right;">{{ $cevap->tarih }} </span>
                        <div class="icerik">
                            <h3 style="line-height: 25px;"> {{ $cevap->detay }} </h3>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</section>

<section class="sss_detay altContent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="iletisimBaslik">
                    <h3> Cevap Yaz </h3>
                </div>
                <br>
                @auth()
                    <form id="cevap" action="{{ route('sorular.kaydet', $item->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="detay" placeholder="Bişeyler Yazın..." rows="10"></textarea>
                            </div>
                            <input type="hidden" name="soru_id" value="{{ $item->id }}">
                            <input type="hidden" name="uye_id" value="{{ Auth::user()->id }}">
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn-uyeol loginBTN">Kaydet</button>
                                <div class="alert" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                    </form>
                @endauth
                @guest
                    <div class="alert alert-danger"> Cevap Verebilmek İçin <a href="{{ route('kullanici.giris') }}">Üye Girişi</a> Yapınız </div>
                @endguest
            </div>
        </div>
    </div>
</section>
@endsection
