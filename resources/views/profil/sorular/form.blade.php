@extends('partial.master')
@section('title', 'Soru Ekle | Dersgo')
@section('content')

    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>{{ Auth::user()->adsoyad }}</h1>
                <p>Bu Kısımdan Sorduğunuz Sorulara Ulaşabilirsiniz</p>
            </div>
        </div>
    </section>
    <section class="altMenu">
        <div class="container">
            <ul>
                <li> <a href="#"> Bilgilerim <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="#"> Testlerim <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="#"> Sorularım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="#"> Notlarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="#"> Satışlarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="#"> Satın Aldıklarım <i class="fa fa-angle-right"></i> </a> </li>
                <li> <a href="{{ route('kullanici.cikis') }}" class="cikisYap"> Çıkış Yap <i class="fa fa-sign-out"></i> </a> </li>
            </ul>
        </div>
    </section>
    <section class="sss_detay altContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="iletisimBaslik">
                        <h3> Soru Sor </h3>
                    </div>
                    <br>
                    <form id="sorular" action="{{ route('profil.sorular.kaydet', $item->id) }}" method="POST">
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
                            <div class="form-group col-md-12">
                                <label class="control-label mb-10" >Soru Başlığı</label>
                                <input type="text" class="form-control" name="baslik" required="" placeholder="Soru Başlığı">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label mb-10" >Soru Detayı</label>
                                <textarea name="detay" id="" rows="5" class="form-control" placeholder="Soru Detayı" style="height: 100px;"></textarea>
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
