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
                                <h5 class="m-b-10">Soru İsteği Detay</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Soru İsteği Detay</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Soru İsteği Detay</h5>
                            <hr>
                            <h3> {{ $item->baslik }} </h3>
                            <p> {{ $item->detay }} </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card review-card">
                                        <div class="card-body">
                                            <div class="review-block">
                                                @foreach($cevaplar as $cevap)
                                                <div class="row">
                                                    <div class="col-sm-auto p-r-0">
                                                        <img src="/upload/kullanici/{{ $cevap->uye_adi->resim }}" class="img-radius profile-img cust-img m-b-15">
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="m-b-15">{{ $cevap->uye_adi->adsoyad }} <span class="float-right f-13 text-muted"> {{ $cevap->tarih }}</span></h6>
                                                        <p class="m-t-15 m-b-15 text-muted">{{ $cevap->detay }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
