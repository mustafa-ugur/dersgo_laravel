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
                                <h5 class="m-b-10">Haber {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ansayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Haber {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Haber {{ @$item->id > 0 ? "Düzenle" : "Ekle" }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.haberler.kaydet', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Haber Başlığı</label>
                                            <input type="text" class="form-control" name="baslik" id="baslik" placeholder="Haber Başlığı" value="{{ $item->baslik }}" require>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Özet</label>
                                            <textarea name="ozet" class="form-control" rows="2" placeholder="Özet"> {{ $item->ozet }} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Açıklama</label>
                                            <textarea name="detay" id="aciklama" >{{ $item->detay }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            @if($item->resim != null)
                                                <img src="/upload/haberler/{{ $item->resim }}" alt="" style="width: 30%;">
                                                <br>
                                            @endif
                                            <label for="exampleInputEmail1">Resim Ekle</label>
                                            <input type="file" class="form-control" name="resim">
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
