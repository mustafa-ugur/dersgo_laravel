@extends('partial.master')
@section('title', 'Profil | Dersgo')
@section('content')
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>{{ Auth::user()->adsoyad }}</h1>
                <p>Bu Kısımdan Bilgileriniz Güncelleyebilirsiniz</p>
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
    <style>
        .bg-success {
            background: #7a1878 !important;
        }
        .btn-success {
            background: #7a1878 !important;
            border-color: #7a1878 !important;
        }
        .sss_detay {
            background: #f7f7f7;
        }
        .beyaz {
            background: #fff;
            margin: 0px 0px 20px 0px;
        }
        .altMenu {
            background: #fff;
            padding: 10px;
            display: table;
            width: 100%;
        }
    </style>

    <section class="sss_detay altContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="beyaz">
                        <div class="iletisimBaslik">
                            <h3> Bilgi Güncelleme </h3>
                        </div>
                        <div class="tab">
                            <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'profil')">Hesabım <i class="fa fa-user"></i> </button>
                            <button class="tablinks" onclick="openCity(event, 'sifre')">Şifre <i class="fa fa-image"></i></button>
                        </div>
                    </div>
                    <br>
                    <style>
                        #bilgiler {
                            background: #fff;
                            padding: 20px;
                        }
                        #bilgiler label {
                            padding-left: 10px;
                        }
                        .Pbaslik h1{
                            font-size: 20px;
                            font-weight: 900;
                            padding: 20px 5px;
                        }
                        .Pimage img{
                            width: 100%;
                        }
                    </style>

                    <div class="tabcontent" id="profil">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="ed_view_box style_2">
                                    <div class="ed_author">
                                        <div class="ed_author_thumb">
                                            <img src="" class="img-fluid">
                                        </div>
                                        <div class="ed_author_box">
                                            <h4>{{ Auth::user()->adsoyad }}</h4>
                                        </div>
                                    </div>
                                    <div class="ed_view_features pl-4">
                                        <span>Üye Bilgileri</span>
                                        <ul>
                                            <li><i class="fa fa-angle-right"></i>Yaş <span> 24 </span> </li>
                                            <li><i class="fa fa-angle-right"></i>Üniversite <span> {{ Auth::user()->adsoyad }} </span> </li>
                                            <li><i class="fa fa-angle-right"></i>Bölüm <span> {{ Auth::user()->adsoyad }} </span> </li>
                                            <li><i class="fa fa-angle-right"></i>E-Mail <span> {{ Auth::user()->email }} </span> </li>
                                            <li><i class="fa fa-angle-right"></i>Telefon <span> {{ Auth::user()->telefon }} </span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8">
                                <div class="edu_wraper">
                                    <h4 class="edu_title">{{ Auth::user()->adsoyad }}</h4>
                                    <form id="guncelle" action="{{ route('profil.kaydet') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Adınız Soyadınız *</label>
                                                <input type="text" class="form-control" name="adsoyad" required="" value="{{ Auth::user()->adsoyad }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">E-Posta Adresiniz</label>
                                                <input type="email" class="form-control" name="email" required=""  value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Cep Telefonunuz</label>
                                                <input type="tel" class="form-control phone_us" name="telefon" required="" value="{{ Auth::user()->telefon }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Adresiniz</label>
                                                <input type="text" class="form-control" name="adres" required="" value="{{ Auth::user()->adres }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Doğum Tarihi</label>
                                                <input type="date" class="form-control phone_us" name="d_tarih" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Üniversite</label>
                                                <input type="text" class="form-control phone_us" name="universite" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Bölümünüz</label>
                                                <input type="text" class="form-control phone_us" name="bolum" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Banka Adı</label>
                                                <input type="text" class="form-control phone_us" name="banka" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">İban Numarası</label>
                                                <input type="text" class="form-control phone_us" name="iban" value="">
                                            </div>
                                            <div class="form-group col-md-12 text-center">
                                                <button type="submit" class="btn btn-uyeol loginBTN">Güncelle</button>
                                                <div class="alert" style="margin-top: 20px;"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="foto" class="tabcontent">

                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
@endsection
