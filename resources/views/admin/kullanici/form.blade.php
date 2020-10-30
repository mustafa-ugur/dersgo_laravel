@extends('admin.partial.master')
@section('title', 'Admin Panel')
@section('content')
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Üye {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Üye {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Üye {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.kullanici.kaydet', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Adı Soyadı</label>
                                            <input type="text" class="form-control" name="adsoyad" id="adsoyad" placeholder="Adı Soyadı" value="{{ $item->adsoyad }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E-Mail Adresi</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail Adresi" value="{{ $item->email }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefon Numarası</label>
                                            <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Telefon" value="{{ $item->telefon }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Şifre</label>
                                            <input type="password" class="form-control" name="sifre" id="sifre" placeholder="Şifre" require>
                                        </div>


                                        <button type="submit" class="btn  btn-primary">{{ @$item->id > 0 ? "Güncelle" : "Kaydet" }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
