@extends('partial.master')
@section('title', 'Anasayfa')
@section('content')
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1>Ödeme Yap</h1>
            </div>
        </div>
    </section>
    <style>
        .billing-fields {
            background: #fff;
            padding: 20px;
        }
        .beyaz {
            background: #fff;
            padding: 20px;
        }
        .beyaz h1 {
            font-weight: 900;
            font-size: 20px;
        }
    </style>
    <section class="sss">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('profil.odeme.odemeyap')}}" method="post">
                        {{ csrf_field() }}
                        <div class="billing-fields">
                            <div class="form-group">
                                <label for="kartno">Kredi Kartı Numarası</label>
                                <input type="text" class="form-control kredikarti" id="kart_numarasi" name="kart_numarasi" style="font-size:20px;" required>
                            </div>
                            <div class="form-group">
                                <label for="cardexpiredatemonth">Son Kullanma Tarihi</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        Ay
                                        <select name="son_kullanma_tarihi_ay" class="select form-control" required style="border: 1px solid #ddd;">
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        Yıl
                                        <select name="son_kullanma_tarihi_yil" class="select form-control" required style="border: 1px solid #ddd;">
                                            <option>2017</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                                <input type="text" class="form-control kredikarti_cvv" name="cvv" id="cvv" required>
                            </div>

                            <div class="form-group first-name">
                                <p><label>Adınız Soyadınız<span class="required">*</span></label></p>
                                <input type="text" placeholder="" class="form-control" name="adsoyad" value="{{ auth()->user()->adsoyad }}">
                            </div>
                            <div class="form-group last-name">
                                <p><label>Telefon<span class="required">*</span></label></p>
                                <input type="text" placeholder="" class="form-control" name="ceptelefon" value="{{auth()->user()->ceptelefon}}">
                            </div>
                            <div class="form-group">
                                <p><label>E-Posta<span class="required">*</span></label></p>
                                <input type="text" placeholder="" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                <input type="hidden" value="{{ auth()->user()->id }}" name="uye_id">
                                <input type="hidden" value="{{ $sepeturun->satici_id }}" name="satici_id">
                            </div>

                        <div class="additional-fields">
                            <div class="order-notes">
                                <div class="form-group order-name">
                                    <p><label>Adres</label></p>
                                    <textarea name="adres" id="checkout-mess" class="form-control" placeholder="Siparişiniz gelmesini istediğiniz adresi yazınız..." rows="2" cols="5"> {{auth()->user()->adres}} </textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="siparis_tutari" value="{{Cart::subtotal()}}">
                        <!--Your Order Fields End-->
                        <div class="checkout-payment">
                            <button class="btn btn-uyeol" type="submit">Ödemeyi Tamamla</button>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="beyaz">
                        <h1> Sipariş Bilgisi </h1>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <th>Kaldır</th>
                            <th>Ders Adı</th>
                            <th>Fiyat</th>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $urunCartItem)
                                <tr>
                                    <td>
                                        <form action="{{ route('profil.sepet.kaldir', $urunCartItem->rowId ) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a style="font-weight: 900; color: #000;" href="{{route('ders_notlari.detay', $urunCartItem->id)}}">{{ $urunCartItem->name }} <i class="fa fa-link"></i> </a>
                                    </td>
                                    <td>
                                        <span>{{ $urunCartItem->price }} ₺</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td colspan="2" align="right"> Toplam Ödenecek Tutar = </td>
                                <td colspan="2" align="right" style="font-weight: 900;">{{ Cart::subtotal() }} ₺</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
