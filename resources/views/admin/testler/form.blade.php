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
                                    <form action="{{ route('admin.testler.kaydet', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bu Soru Kaç Puan</label>
                                            <input type="text" class="form-control" name="puan" id="puan" placeholder="Bu Soru Kaç Puan" value="{{ $item->puan }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Soru</label>
                                            <input type="text" class="form-control" name="soru" id="soru" placeholder="Soru" value="{{ $item->soru }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">A : </label>
                                            <input type="text" class="form-control" name="a" id="a" placeholder="A : " value="{{ $item->a }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">B : </label>
                                            <input type="text" class="form-control" name="b" id="b" placeholder="B : " value="{{ $item->b }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">C : </label>
                                            <input type="text" class="form-control" name="c" id="c" placeholder="C : " value="{{ $item->c }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">D : </label>
                                            <input type="text" class="form-control" name="d" id="d" placeholder="D : " value="{{ $item->d }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E : </label>
                                            <input type="text" class="form-control" name="e" id="e" placeholder="E : " value="{{ $item->e }}" require>
                                        </div>

                                        <div class="form-group">
                                            <select name="kid" id="kid" class="form-control">
                                                <option value="">Kategori Seçininiz</option>
                                                @foreach($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ $item->kid == $kategori->id ? 'selected' : '' }}> {{ $kategori->baslik }}</option>
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
