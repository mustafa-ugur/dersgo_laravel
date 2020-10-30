@extends('admin.partial.master')
@section('title', 'Admin Panel')
@section('content')
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Kategoriler Listesi</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Kategoriler Listesi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="margin-top: 10px; width: 100%;">Kategoriler Listesi</h5>
                            <hr>
                                    <form method="post" action="{{ route('admin.kategoriler.index') }}" class="form-inline" style="width: 50%; float:left;">
                                        {{ csrf_field() }}
                                            <select name="ustu" id="ustu" class="form-control">
                                                <option value="">Kategori Filtreleme</option>
                                                @foreach($anakategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ old('ustu') == $kategori->id ? 'selected' : '' }}> {{ $kategori->kategori }}
                                                    @foreach($anakategoriler as $alt_kat)
                                                        @if($kategori->id == $alt_kat->ustu)
                                                            <option value="{{ $alt_kat->id }}" {{ old('ustu') == $alt_kat->id ? 'selected' : '' }}>     - {{ $alt_kat->kategori }}
                                                            @foreach($anakategoriler as $en_alt_kat)
                                                                @if($alt_kat->id == $en_alt_kat->ustu)
                                                                    <option value="{{ $en_alt_kat->id }}" {{ old('ustu') == $en_alt_kat->id ? 'selected' : '' }}>     -- {{ $en_alt_kat->kategori }}</option>
                                                                @endif
                                                            @endforeach
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Ara</button>
                                    </form>
                            <a href="{{ route('admin.kategoriler.ekle') }}" class="btn btn-primary float-right"> Kategoriler Ekle </a>
                            </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori Adı</th>
                                        <th>Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $lis)
                                        <tr>
                                            <td style="width: 2%;">{{ $lis->id }}</td>
                                            <td>{{ $lis->kategori }}</td>
                                            <td style="width: 2%;">
                                                 @if ($lis->aktif == 1)
                                                    <a class="btn aktif" href="{{ route('admin.kategoriler.pasif', $lis->id) }}">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @else
                                                    <a class="btn pasif" href="{{ route('admin.kategoriler.aktif', $lis->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="table-action" style="width: 10%;">
                                                <a href="{{ route('admin.kategoriler.duzenle', $lis->id) }}" class="btn btn-outline-primary"><i class="feather icon-edit"></i> Düzenle </a>
                                                <a href="{{ route('admin.kategoriler.sil', $lis->id) }}" onclick="return confirmDel();" class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Sil</a>
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
