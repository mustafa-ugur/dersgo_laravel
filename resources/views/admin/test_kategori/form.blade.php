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
                                <h5 class="m-b-10">Test {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Test {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Test {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.test_kategori.kaydet', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Başlık</label>
                                            <input type="text" class="form-control" name="baslik" id="baslik" placeholder="Başlık" value="{{ $item->baslik }}" require>
                                        </div>
                                        <div class="form-group">
                                            <select name="kid" id="kid" class="form-control">
                                                <option value="">Kategori Seçininiz</option>
                                                @foreach($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ $item->kid == $kategori->id ? 'selected' : '' }}> {{ $kategori->kategori }}
                                                    @foreach($kategoriler as $alt_kat)
                                                        @if($kategori->id == $alt_kat->ustu)
                                                            <option value="{{ $alt_kat->id }}" {{ $item->kid == $alt_kat->id ? 'selected' : '' }}>  - {{ $alt_kat->kategori }}
                                                            @foreach($kategoriler as $en_alt_kat)
                                                                @if($alt_kat->id == $en_alt_kat->ustu)
                                                                    <option value="{{ $en_alt_kat->id }}" {{ $item->kid == $en_alt_kat->id ? 'selected' : '' }}> -- {{ $en_alt_kat->kategori }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                    </option>
                                                                    @endforeach
                                            </select>
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
