<header>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-auto">
                <div class="float-right"> <a href="" class="ustTxt"> info@dersgo.com </a> </div>
            </div>
            <div class="col-auto" style="padding: 0px 10px;">
                <div class="float-right">
                    @auth()
                        <a href="{{ route('profil.index') }}" class="ustTxt"> {{ Auth::user()->adsoyad }} </a> / <a href="{{ route('kullanici.cikis') }}" class="ustTxt"> Çıkış Yap </a>
                    @endauth
                    @guest
                        <a href="{{ route('kullanici.uyeol') }}" class="ustTxt"> Üye Ol </a> / <a href="{{ route('kullanici.giris') }}" class="ustTxt"> Giriş Yap </a>
                    @endguest
                </div>
            </div>
        </div>
        <div class="row navMenu">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{ route('index') }}"><img src="/assets/images/logo.png" alt=""></a>
                </div>
            </div>

            <div class="col-md-7">
                <div class="navigation">
                    <ul>
                        <li> <a href="{{ route('testler.index') }}"> TEST </a> </li>
                        <li> <a href="{{ route('ders_notlari.index') }}"> DERS NOTLARI </a> </li>
                        <li> <a href="{{ route('sss.index') }}"> SSS </a> </li>
                        <li> <a href="{{ route('testler.index') }}"> AÖF ÇIKMIŞ SORULAR  </a> </li>
                        <li> <a href=""> İLETİŞİM  </a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="dropdown sepetmobil">
                    <button onclick="myFunction()" class="dropbtn">
                        <i class="fa fa-shopping-cart" style="padding-right: 10px;"></i> Sepetim
                        <span id="spnCount" class="margin-left-md margin-left-sm-mb margin-left-sm-lg badge cart-count" style="padding: 10px; font-size: 15px;">{{ Cart::count() }}</span>
                    </button>
                    <div id="myDropdown" class="dropdown-content">
                        <ul class="cart-dropdown">
                            @foreach(Cart::content() as $urunCartItem)
                                <li class="cart-item">
                                    <div class="cart-content">
                                        <h4><a href="#">{{ $urunCartItem->name }}</a></h4>
                                        <p class="cart-quantity">Adet: {{ $urunCartItem->qty }} </p>
                                        <p class="cart-price">{{ $urunCartItem->price }} ₺ </p>
                                    </div>
                                    <div class="cart-close">
                                        <form action="{{ route('profil.sepet.kaldir', $urunCartItem->rowId ) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="x">
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                            <li class="cart-total-amount mtb-20">
                                <h4>Toplam Tutar : <span class="pull-right">{{ Cart::total() }} ₺ </span></h4>
                            </li>
                            <li class="cart-button">
                                <a href="{{route('profil.sepet.index')}}" class="button2">Sepete Git</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    function myFunction() {
                        document.getElementById("myDropdown").classList.toggle("show");
                    }
                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function(e) {
                        if (!e.target.matches('.dropbtn')) {
                            var myDropdown = document.getElementById("myDropdown");
                            if (myDropdown.classList.contains('show')) {
                                myDropdown.classList.remove('show');
                            }
                        }
                    }
                </script>
            </div>
        </div>
        @if(Request::is('/'))
        <div class="navMenu" style="background: #321232;">
            <div class="row">
                <div class="col-md-2">
                    <div class="iconDuyuru"> <img src="/assets/images/iconDuyuru.png" alt=""> </div>
                </div>
                <div class="col-md-10">
                    <div class="duyuruTxt">
                        <ul>
                            <li>
                                <a href="#">
                                    <span><marquee direction="left">
                                           <a style="color: #fff;" href="#">aıodjashdıuasda</a>
                                        </marquee></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sliderTxt">
            <h1> DERSGO.COM </h1>
            <p>AIOSDHJAIUDASDASJD</p>
            <a href="#" class="indexLoginBtn"> GİRİŞ YAP </a>
            <a href="#" class="indexLoginBtn"> <B>DERSGO </B> NEDİR ? </a>
        </div>
        @endif

    </div>
</header>
