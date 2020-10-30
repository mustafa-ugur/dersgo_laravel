@extends('partial.master')
@section('title', 'Ders Notlari | Dersgo')
@section('content')
<section class="ustBanner">
    <div class="container">
        <div class="text">
            <h1>Ders Notları</h1>
            <p>{{ $item->baslik }}</p>
        </div>
    </div>
</section>
<section class="dersDetay">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="edu_wraper">
                    <h4 class="edu_title">{{ $item->baslik }}</h4>
                    <p>{{ $item->detay }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="ed_view_box style_2">
                    <div class="ed_author">
                        <div class="ed_author_thumb">
                            <img src="/upload/notlar/{{ $item->resim }}" class="img-fluid">
                        </div>
                        <div class="ed_author_box">
                            <h4><a style="color: #333;" href="">{{ $item->uye_adi->adsoyad }}</a> </h4>
                            <span>{{ $item->uye_adi->adsoyad }}</span>
                        </div>
                    </div>
                    <div class="ed_view_features pl-4">
                        <span>Not Özellikler</span>
                        <ul>
                            <li><i class="fa fa-angle-right"></i>Kayıtlı öğrenci <span> 5001 </span> </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="ed_view_price pl-4">
                        <span>Ders Notu Fiyatı</span>
                        <br>
                        <span><del>{{ $item->ana_fiyat }} ₺ </del></span>
                        <br>
                        <h2 class="theme-cl">{{ $item->fiyat }} ₺ </h2>
                        <hr>
                        <span>Sosyal Medyada Paylaş</span>
                        <br>
                        <br>
                        <a style="color: #333;" href="https://www.facebook.com/sharer/sharer.php?u="> <i class="fa fa-facebook"></i> </a>
                        <a style="color: #333;" href="https://twitter.com/share?url="> <i class="fa fa-twitter"></i> </a>
                    </div>
                    <div class="ed_view_link">
                        @auth()
                            <form action="{{ route('profil.sepet.ekle') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="satici_id" value="{{ $item->uye_adi->id }}">
                                {{--<input type="submit" class="quantity-button" value="Sepete Ekle">--}}
                                <button class="btn btn-uyeol quantity-button"> SEPETE EKLE <i class="fa fa-shopping-cart"></i> </button>
                            </form>
                        @endauth
                        @guest()
                            <button class="btn btn-uyeol"> Sepete Eklemek İçin Giriş Yapınız </button>
                        @endguest
                    </div>
                </div>
                <div class="ed_view_box style_2">
                    <div class="ed_author">
                        <div class="ed_author_box">
                            <h4>Dosyaları İndir</h4>
                        </div>
                    </div>
                    <div class="ed_view_features pl-4">
                        <ul>
                            @foreach($dosyalar as $dosya)
                            <li style="margin: 0 auto;display: table;width: 100%;padding-right: 30px;">
                                <a href="/upload/notlar/{{ $dosya->resim }}" target="_blank" class="btn btn-uyeol"> İNDİR <i class="fa fa-download" style="width: auto;height: auto;background: none;border-radius: 0;position: relative;left: 0;top: 0;font-size: 30px;display: contents;align-items: center;justify-content: right;color: #ffff;margin-top: 8px;"></i> </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="test_detay edu_wraper">
            <div class="container">
                <div class="col-md-12">
                    <div class="iletisimBaslik">
                        <h3> Yorumlar : </h3>
                    </div>
                </div>
               @foreach($yorumlar as $yorum)
                <div class="col-md-12">
                    <div class="sorular">
                        <span style="width: 50%;float: left;"> Yorum Yapan :  {{ $yorum->uye_adi->adsoyad }} </span>
                        <span style="width: 50%;text-align: right;"> {{ $yorum->tarih }} </span>
                        <div class="icerik">
                            <h3 style="line-height: 25px;"> {{ $yorum->detay }} </h3>
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
                            <h3> Yorum Yap </h3>
                        </div>
                        <br>
                       @auth()
                        <form id="yorumlar" action="{{ route('ders_notlari.kaydet', $item->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" style="height: 100px;" name="detay" placeholder="Yorum Yapın..." rows="10"></textarea>
                                </div>
                                <input type="hidden" name="ders_id" value="{{ $item->id }}">
                                <input type="hidden" name="uye_id" value="{{ Auth::user()->id }}">
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn btn-uyeol loginBTN">Kaydet</button>
                                    <div class="alert" style="margin-top: 20px;"></div>
                                </div>
                            </div>
                        </form>
                        @endauth
                        @guest()
                        <div class="alert alert-danger"> Cevap Verebilmek İçin <a href="{{ route('kullanici.giris') }}">Üye Girişi</a> Yapınız </div>
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
