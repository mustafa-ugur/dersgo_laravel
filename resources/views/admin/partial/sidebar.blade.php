<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <i class="fa fa-user" style="font-size: 50px; padding: 10px 0px"></i>
                    <div class="user-details">
                        <div id="more-details" style="color: #bbbcbb;">CMD MEDYA <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menü</label>
                </li>
                <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Anasayfa</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.kategoriler.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list"></i></span><span class="pcoded-mtext">Kategoriler</span></a></li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-file-alt"></i></span><span class="pcoded-mtext">Test</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.testler.index') }}">Soru Listesi</a></li>
                        <li><a href="{{ route('admin.test_kategori.index') }}">Test Listesi</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-audio-description"></i></span><span class="pcoded-mtext">Ders Notları</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.sss.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-comment"></i></span><span class="pcoded-mtext">S.s.s</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.duyurular.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-newspaper"></i></span><span class="pcoded-mtext">Duyurular</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.haberler.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-newspaper"></i></span><span class="pcoded-mtext">Aöf Haberler</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.istatistik.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-signal"></i></span><span class="pcoded-mtext">İstatistik</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.slogan.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-image"></i></span><span class="pcoded-mtext">Slogan</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.sorular.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-question"></i></span><span class="pcoded-mtext">Soru İstekleri</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.sayfa.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-file-alt"></i></span><span class="pcoded-mtext">Sayfalar</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.kullanici.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-users"></i></span><span class="pcoded-mtext">Üyeler</span></a></li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Site Ayarları</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Genel Ayarlar</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">İletişim Bilgileri</a></li>
                        <li><a href="#">Sosyal Medya</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{ route('admin.cikis') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-power-off"></i></span><span class="pcoded-mtext">Çıkış Yap</span></a></li>
            </ul>
        </div>
    </div>
</nav>
