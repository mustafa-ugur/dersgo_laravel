@extends('partial.master')
@section('title', 'Ders Notları | Dersgo')
@section('content')

    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>{{ Auth::user()->adsoyad }}</h1>
                <p>Bu Kısımdan Ders Notu Ekleyebilir / Güncelleyebilirsiniz</p>
            </div>
        </div>
    </section>
    <section class="altMenu">
        <div class="container">
            <ul>
                <li> <a href="{{ route('profil.index') }}"> Bilgilerim <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('profil.testler.index') }}"> Testlerim <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('profil.sorular.index') }}"> Sorularım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('profil.notlar.index') }}"> Notlarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('profil.satislarim.index') }}"> Satışlarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('profil.satin_aldiklarim.index') }}"> Satın Aldıklarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('kullanici.cikis') }}" class="cikisYap"> Çıkış Yap <i class="fa fa-sign-out"></i> </a> </li>
            </ul>
        </div>
    </section>
    <section class="sss_detay altContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="iletisimBaslik">
                        <h3> Not Ekle </h3>
                    </div>
                    <br>
                    <form id="" action="{{ route('profil.notlar.kaydet', $item->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">kategori Seçiniz</label>
                                <select name="kid" class="form-control">
                                    <option value="">Kategori Seçiniz</option>
                                    @foreach($kategoriler as $kategori)
                                        <optgroup label="{{ $kategori->kategori }}">
                                            @foreach($kategori->alt_kategoriler as $kate)
                                                <option value="{{ $kate->id }}" disabled>-{{ $kate->kategori }}</option>
                                                @foreach($kate->alt_kategoriler as $kat)
                                                    <option value="{{ $kat->id }}" {{ $item->kid == $kat->id ? "selected" : "" }}>--{{ $kat->kategori }}</option>
                                                @endforeach
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">Ders Notu Başlığı </label>
                                <input type="text" name="baslik" class="form-control" placeholder="Not Başlığı" value="{{ $item->baslik }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">Ana Fiyat</label>
                                <input type="number" name="ana_fiyat" class="form-control" placeholder="Ana Fiyat" value="{{ $item->ana_fiyat }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">İndirimli Fiyat</label>
                                <input type="number" name="fiyat" class="form-control" placeholder="İndirimli Fiyat" value="{{ $item->fiyat }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">Kısa Açıklama </label>
                                <input type="text" name="ozet" class="form-control" placeholder="Kısa Açıklama" value="{{ $item->ozet }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label mb-10">Ders Notu Açıklaması</label>
                                <textarea name="detay" style="height: 100px;" rows="3" class="form-control" placeholder="Ders Notu Açıklaması" required> {{ $item->detay }} </textarea>
                            </div>
                            <div class="form-group">
                                @if($item->resim != null)
                                    <img src="/upload/notlar/{{ $item->resim }}" alt="" style="width: 30%;">
                                    <br>
                                @endif
                                <label for="exampleInputEmail1">Resim Ekle</label>
                                <input type="file" class="form-control" name="resim">
                            </div>
                            <input type="hidden" name="uye_id" value="{{ Auth::user()->id }}">

                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn-uyeol loginBTN">kaydet</button>
                                <div class="alert" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
