@extends('partial.master')
@section('title', 'Ders Notlari | Dersgo')
@section('content')
    <style>
        #accordion {
            visibility: hidden;
            font-weight: normal;
            font-size: medium;
            font-family: 'Lucida Grande', Geneva, Candara, Tahoma, sans-serif;
            color: black;
            background-color: #fff;
        }
        #accordion .top > div {
            background-color: #fff;
        }
        #accordion .top > ul {
            border-top: 1px solid #ddd;
        }
        #accordion p {
            border-top: 1px solid #ddd;
            padding: 10px 20px 0px 20px;
            margin: 6px 0 22px;
        }
        .sidebar {
            background: #fff;
            border-radius: 20px;
            min-height: 300px;
            padding: 0;
            color: #fff;
        }

        .sidebar .sidebarTitle {
            font-size: 20px;
            color: #000;
            font-weight: 900;
            padding: 10px 0px;
            margin: 0 auto;
            display: table;
            margin-bottom: 20px;
        }
        .sidebar .sidebarContent ul li a.active {
            color: #791878;
        }
        .sidebar .sidebarContent ul li a {
            color: #111;
            font-family: 'Quicksand', sans-serif;
            font-size: 15px;
            font-weight: 100;
        }
    </style>
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>Ders Notları</h1>
                <p>Bu Kısımdan Ders Notu Satın Alabilirsiniz</p>
            </div>
        </div>
    </section>

    <section class="dersNotlari test">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar" style="background: #fff;">
                        <div class="logo">
                            <img src="/assets/images/logo.png" style="margin: 0 auto; display: table; padding: 10px;">
                        </div>
                        <div class="sidebarTitle">
                            <h1> BÖLÜMLER </h1>
                        </div>
                        <div class="sidebarContent" style="display: block;">
                            <div id="accordion">
                                <ul>
                                    @foreach($kategoriler as $kategori)
                                        <li>
                                            <div>{{ $kategori->kategori }}</div>
                                            <ul>
                                                @foreach($kategori->alt_kategoriler as $kate)
                                                    <li>
                                                        <div>{{ $kate->kategori }} </div>
                                                        <p>
                                                            @foreach($kate->alt_kategoriler as $kat)
                                                                <a href="{{ route('ders_notlari.filtrele', $kat->id) }}"> {{ $kat->kategori }} </a>
                                                            @endforeach
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                       @foreach($notlar as $d_not)
                        <div class="col-md-6">
                            <div class="dersNotSlider">
                                <div class="resim">
                                    <img src="/upload/notlar/{{ $d_not->resim }}" alt="">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="user">
                                            <div class="userResim">
                                                <img src="/upload/kullanici/{{ $d_not->uye_adi->resim }}" alt="">
                                            </div>
                                            <div class="userName">
                                                <h3>{{ $d_not->uye_adi->adsoyad }}</h3>
                                                <span>Bölüm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="user">
                                            <div class="userName">
                                                <span style="margin-left: -25px;"> <del>{{ $d_not->ana_fiyat }} ₺</del> </span>
                                                <h3 style="margin-left: -25px;">{{ $d_not->fiyat }} ₺ </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dersContent">
                                    <h1>{{ $d_not->baslik }}</h1>
                                    <p>{{ $d_not->ozet }}</p>
                                </div>
                                <div class="dersSepet">
                                    <a href="{{ route('ders_notlari.detay', $d_not->id) }}"> DETAY </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
