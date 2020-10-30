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
                                <h5 class="m-b-10">Test Listesi</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Test Listesi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="margin-top: 10px; width: 100%;">Test Listesi</h5>
                            <a href="{{ route('admin.test_kategori.ekle') }}" class="btn btn-primary float-right"> Test Ekle </a>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Test Adı</th>
                                        <th>Test Kategorisi</th>
                                        <th>Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $lis)
                                        <tr>
                                            <td style="width: 2%;">{{ $lis->id }}</td>
                                            <td>{{ $lis->baslik }}</td>
                                            <td>{{ $lis->kategoriler->kategori }}</td>
                                            <td style="width: 2%;">
                                                @if ($lis->aktif == 1)
                                                    <a class="btn aktif" href="{{ route('admin.test_kategori.pasif', $lis->id) }}">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @else
                                                    <a class="btn pasif" href="{{ route('admin.test_kategori.aktif', $lis->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="table-action" style="width: 10%;">
                                                <a href="{{ route('admin.test_kategori.duzenle', $lis->id) }}" class="btn btn-outline-primary"><i class="feather icon-edit"></i> Düzenle </a>
                                                <a href="{{ route('admin.test_kategori.sil', $lis->id) }}" onclick="return confirmDel();" class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Sil</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
