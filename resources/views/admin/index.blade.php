@extends('admin.partial.master')
@section('title', 'Admin Panel')
@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Anasayfa</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-yellow"> 123124 </h4>
                                            <h6 class="text-muted m-b-0">Üyeler</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-users f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <a href="" class="text-white m-b-0">Üye Listesi</a>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-blue"> 123123 </h4>
                                            <h6 class="text-muted m-b-0">Siparişler</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-shopping-cart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <a href="" class="text-white m-b-0">Sipariş Listesi</a>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green">125</h4>
                                            <h6 class="text-muted m-b-0">Haberler</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fab fa-product-hunt f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <a href="" class="text-white m-b-0">Haber Listesi</a>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red"> 123 </h4>
                                            <h6 class="text-muted m-b-0">Kategoriler</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-package f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <a href="" class="text-white m-b-0">Kategori Listesi</a>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
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

@endsection
