@extends('partial.master')
@section('title', 'Anasayfa')
@section('content')

<section class="slider"></section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="logo">
                            <img src="/assets/images/logo.png" style="margin: 0 auto; display: table; padding: 10px;">
                        </div>
                        <div class="sidebarTitle">
                            <h1> BÖLÜMLER / ODALAR </h1>


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
                                                    <a  href="#"> {{ $kat->kategori }} </a>
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
                    <div class="sagicerik">
                         <div class="chatoff"><h2>Canlı Chat İçin <a href=" ">Giriş Yap ! </a></h2></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="soru">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sorular">
                        <div class="soruTitleSol">
                            <h1> SORU / CEVAP </h1>
                            <span> <hr> </span>
                        </div>
                        <div class="soruContent">
                            <ul>
                                @foreach($sorular as $sor)
                                    <li><a href="{{ route('sorular.detay', $sor->id) }}"> {{ $sor->baslik }} </a></li>
                                @endforeach
                            </ul>
                            <a href="#" class="btn btn-uyeol float-right"> Soru Sor </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="soruTitleSag">
                        <h1> ÇIKMIŞ SORULAR </h1>
                        <span> <hr> </span>
                    </div>
                    <div class="soruContent">
                        <ul>
                            <li><a href="#"> Deneme Sınavı </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="haberler">
        <div class="container">
            <div class="row">
                <div class="haberTitle">
                    <h1> HABERLER </h1>
                    <span> <hr> </span>
                </div>

                <div class="row">
                    @php $i = 0; @endphp
                    @foreach($haberler as $haber)
                    <div class="col-md-4 @php if ($i == "0") { echo ' koyuhaber'; } @endphp ">
                        <div class="bgBlogB">
                            <div class="tarih">
                                <span class="rakam"> {{ $haber->gun }} </span>
                                <br>
                                <span class="harf"> {{ $haber->ay }} </span>
                            </div>
                            <div class="haberContent">
                                <h2> {{ $haber->baslik }} </h2>
                                <span> <i class="fa fa-map-marker"></i> AOF HABERLER </span>
                                <span> <i class="fa fa-clock"></i> {{ $haber->saat }}</span>
                                <br>
                                <a href="#"> DETAYLARINI GÖR </a>
                            </div>
                        </div>
                    </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="counterAna">
        <div class="container">
            <div class="row">

                @foreach($istatistik as $ista)
                <div class="col-md-3">
                    <div class="counterDiv">
                        <div class="row">
                            <div class="col-md-4" style="padding: 0px !important;">
                                <h1><span class="counter">{{ $ista->sayi }}</span></h1>
                            </div>
                            <div class="col-md-8">
                                <i class="fa {{ $ista->icon }}"></i>
                                <h3> {{ $ista->baslik }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <section class="dersNotlari">
        <div class="container">
            <div class="dersTitle">
                <h1> DERS NOTLARI </h1>
                <span> <hr> </span>
            </div>
            <div class="tab">
                <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'tum')">En Çok Satanlar</button>
            </div>
            <div class="bosluk">
                <div id="tum" class="tabcontent">
                    <div class="owl-carousel owl-theme" id="owl-dersler">

                        <div class="item">
                            <div class="dersNotSlider">
                                <div class="resim">
                                    <img src="https://via.placeholder.com/300" alt="">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="user">
                                            <div class="userResim">
                                                <img src="https://via.placeholder.com/150" alt="">
                                            </div>
                                            <div class="userName">
                                                <h3>Mustafa Uğur</h3>
                                                <span>Bilişim</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="user">
                                            <div class="userName">
                                                <span style="margin-left: -25px;"> <del>500.00 ₺</del> </span>
                                                <h3 style="margin-left: -25px;">200.00 ₺ </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dersContent">
                                    <h1> jsdhıasd </h1>
                                    <p>ajkshda sdasndas dhjuasbndabs dbnas dasdajsasdıb </p>
                                </div>
                                <div class="dersSepet">
                                    <a href=""> DETAY </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sss">
        <div class="container">
            <div class="sssTitle">
                <h1> SIKÇA SORULAN SORULAR </h1>
                <span> <hr> </span>
            </div>
            <div class="accordionMenu">
                @foreach($sss as $s)
                <button class="sssAccordion" type="button" data-toggle="collapse" data-target="#sss{{ $s->id }}" aria-expanded="false" aria-controls="sss{{ $s->id }}">
                    {{ $s->baslik }}
                </button>
                <div class="collapse" id="sss{{ $s->id }}">
                    <div class="Cicerik">
                        <p> {!! str_replace('_', ' ', $s->detay)  !!}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
