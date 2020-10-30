@extends('partial.master')
@section('title', 'Anasayfa')
@section('content')

    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1> GİRİŞ YAP </h1>
                <p><b>Dersgo</b>'ya hemen giriş yapın, ayrıcalıkları yakalayın.</p>
            </div>
        </div>
    </section>


    <div class="container fadeInDown"  style="margin-top:50px;">
        <div class="row">

            <div class="col-md-5">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->
                    <div class="fadeIn first">
                        <div class="logo">
                            <a href="#"><img src="/assets/images/logo.png" style="width:60%"></a>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <form class="loginForm" id="loginForm" action="{{ route('kullanici.giris') }}" method="post">
                        {{ csrf_field() }}
                        <input type="email" class="form-control fadeIn second" name="email" id="login" required="" placeholder="E-Posta Adresiniz">
                        <input type="password" class="form-control fadeIn third " name="sifre" required="" placeholder="Şifreniz">
                        <button type="submit" class="btn btn-uyeol loginBTN fadeIn fourth">Giriş Yap</button>
                        <div class="alert" style="margin-top:20px;"></div>
                    </form>
                    <div id="formFooter">
                        <a class="underlineHover" href="">Şifremi Unuttum </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <img src="/assets/images/uye.jpg" style="width:100%;">
            </div>
        </div>

        <div class="clearfix"></div>
    </div>


@endsection
