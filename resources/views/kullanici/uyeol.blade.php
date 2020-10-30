@extends('partial.master')
@section('title', 'Anasayfa')
@section('content')

    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1> ÜYE OL </h1>
                <p> Hemen Şimdi Üye Olun <b>Dersgo</b> ile ayrıcalıkları yakalayın..</p>
            </div>
        </div>
    </section>

    <section class="altContent">
        <div class="container">
            <form action="{{ route('kullanici.kaydol') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Adınız Soyadınız *</label>
                        <input type="text" class="form-control" name="adsoyad" placeholder="Adınız Soyadınız *">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label mb-10" for="exampleInputEmail_2">E-Posta Adresiniz</label>
                        <input type="email" class="form-control" name="email"  placeholder="E-Posta Adresiniz">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Şifre</label>
                        <input type="password" class="form-control" name="sifre" placeholder="Şifre">
                    </div>

                    <div class="form-group col-md-12 text-center">
                        <p> Kaydolarak <a target="_blank" href="#">Kullanım Şartlarımızı</a> ve <a target="_blank" href="#">Gizlilik Politikamızı</a> kabul etmiş olursunuz.</p>
                    </div>

                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn btn-uyeol loginBTN">Üye Ol</button>
                        <div class="alert" style="margin-top: 20px;"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
