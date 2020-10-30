<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::redirect('/', '/admin/giris');
    Route::match(['get', 'post'], '/giris', 'KullaniciController@giris')->name('admin.giris');
    Route::get('/cikis', 'KullaniciController@cikis')->name('admin.cikis');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/index', 'IndexController@index')->name('admin.index');

        Route::group(['prefix' => 'kategoriler'], function() {
            Route::match(['get', 'post'], '/', 'KategoriController@index')->name('admin.kategoriler.index');
            Route::get('/ekle', 'KategoriController@form')->name('admin.kategoriler.ekle');
            Route::get('/duzenle{id}', 'KategoriController@form')->name('admin.kategoriler.duzenle');
            Route::post('/duzenle{id?}', 'KategoriController@kaydet')->name('admin.kategoriler.kaydet');
            Route::get('/sil{id}', 'KategoriController@sil')->name('admin.kategoriler.sil');
            Route::get('/aktif{id}', 'KategoriController@aktif')->name('admin.kategoriler.aktif');
            Route::get('/pasif{id}', 'KategoriController@pasif')->name('admin.kategoriler.pasif');
        });

        Route::group(['prefix' => 'duyurular'], function() {
            Route::match(['get', 'post'], '/', 'DuyuruController@index')->name('admin.duyurular.index');
            Route::get('/ekle', 'DuyuruController@form')->name('admin.duyurular.ekle');
            Route::get('/duzenle{id}', 'DuyuruController@form')->name('admin.duyurular.duzenle');
            Route::post('/duzenle{id?}', 'DuyuruController@kaydet')->name('admin.duyurular.kaydet');
            Route::get('/sil{id}', 'DuyuruController@sil')->name('admin.duyurular.sil');
            Route::get('/aktif{id}', 'DuyuruController@aktif')->name('admin.duyurular.aktif');
            Route::get('/pasif{id}', 'DuyuruController@pasif')->name('admin.duyurular.pasif');
        });

        Route::group(['prefix' => 'haberler'], function() {
            Route::match(['get', 'post'], '/', 'HaberController@index')->name('admin.haberler.index');
            Route::get('/ekle', 'HaberController@form')->name('admin.haberler.ekle');
            Route::get('/duzenle{id}', 'HaberController@form')->name('admin.haberler.duzenle');
            Route::post('/duzenle{id?}', 'HaberController@kaydet')->name('admin.haberler.kaydet');
            Route::get('/sil{id}', 'HaberController@sil')->name('admin.haberler.sil');
            Route::get('/aktif{id}', 'HaberController@aktif')->name('admin.haberler.aktif');
            Route::get('/pasif{id}', 'HaberController@pasif')->name('admin.haberler.pasif');
        });

        Route::group(['prefix' => 'sayfa'], function() {
            Route::match(['get', 'post'], '/', 'YazilarController@index')->name('admin.sayfa.index');
            Route::get('/ekle', 'YazilarController@form')->name('admin.sayfa.ekle');
            Route::get('/duzenle{id}', 'YazilarController@form')->name('admin.sayfa.duzenle');
            Route::post('/duzenle{id?}', 'YazilarController@kaydet')->name('admin.sayfa.kaydet');
            Route::get('/sil{id}', 'YazilarController@sil')->name('admin.sayfa.sil');
            Route::get('/aktif{id}', 'YazilarController@aktif')->name('admin.sayfa.aktif');
            Route::get('/pasif{id}', 'YazilarController@pasif')->name('admin.sayfa.pasif');
        });

        Route::group(['prefix' => 'kullanici'], function() {
            Route::match(['get', 'post'], '/', 'KullaniciController@index')->name('admin.kullanici.index');
            Route::get('/ekle', 'KullaniciController@form')->name('admin.kullanici.ekle');
            Route::get('/duzenle{id}', 'KullaniciController@form')->name('admin.kullanici.duzenle');
            Route::post('/duzenle{id?}', 'KullaniciController@kaydet')->name('admin.kullanici.kaydet');
            Route::get('/sil{id}', 'KullaniciController@sil')->name('admin.kullanici.sil');
            Route::get('/aktif/{id}', 'KullaniciController@aktif')->name('admin.kullanici.aktif');
            Route::get('/pasif/{id}', 'KullaniciController@pasif')->name('admin.kullanici.pasif');
        });

        Route::group(['prefix' => 'sss'], function() {
            Route::match(['get', 'post'], '/', 'SssController@index')->name('admin.sss.index');
            Route::get('/ekle', 'SssController@form')->name('admin.sss.ekle');
            Route::get('/duzenle/{id}', 'SssController@form')->name('admin.sss.duzenle');
            Route::post('/duzenle/{id?}', 'SssController@kaydet')->name('admin.sss.kaydet');
            Route::get('/sil/{id}', 'SssController@sil')->name('admin.sss.sil');
            Route::get('/aktif/{id}', 'SssController@aktif')->name('admin.sss.aktif');
            Route::get('/pasif/{id}', 'SssController@pasif')->name('admin.sss.pasif');
        });

        Route::group(['prefix' => 'sorular'], function() {
            Route::match(['get', 'post'], '/', 'SorularController@index')->name('admin.sorular.index');
            Route::get('/detay/{id}', 'SorularController@form')->name('admin.sorular.detay');
            Route::get('/aktif/{id}', 'SorularController@aktif')->name('admin.sorular.aktif');
            Route::get('/pasif/{id}', 'SorularController@pasif')->name('admin.sorular.pasif');
        });

        Route::group(['prefix' => 'istatistik'], function() {
            Route::match(['get', 'post'], '/', 'IstatistikController@index')->name('admin.istatistik.index');
            Route::get('/duzenle{id}', 'IstatistikController@form')->name('admin.istatistik.duzenle');
            Route::post('/duzenle{id?}', 'IstatistikController@kaydet')->name('admin.istatistik.kaydet');
        });

        Route::group(['prefix' => 'slogan'], function() {
            Route::match(['get', 'post'], '/', 'SlaytController@index')->name('admin.slogan.index');
            Route::get('/duzenle{id}', 'SlaytController@form')->name('admin.slogan.duzenle');
            Route::post('/duzenle{id?}', 'SlaytController@kaydet')->name('admin.slogan.kaydet');
        });

        Route::group(['prefix' => 'testler'], function() {
            Route::match(['get', 'post'], '/', 'TestlerController@index')->name('admin.testler.index');
            Route::get('/ekle', 'TestlerController@form')->name('admin.testler.ekle');
            Route::get('/duzenle{id}', 'TestlerController@form')->name('admin.testler.duzenle');
            Route::post('/duzenle{id?}', 'TestlerController@kaydet')->name('admin.testler.kaydet');
            Route::get('/sil{id}', 'TestlerController@sil')->name('admin.testler.sil');
            Route::get('/aktif{id}', 'TestlerController@aktif')->name('admin.testler.aktif');
            Route::get('/pasif{id}', 'TestlerController@pasif')->name('admin.testler.pasif');
        });

        Route::group(['prefix' => 'test_kategori'], function() {
            Route::match(['get', 'post'], '/', 'TestkategoriController@index')->name('admin.test_kategori.index');
            Route::get('/ekle', 'TestkategoriController@form')->name('admin.test_kategori.ekle');
            Route::get('/duzenle{id}', 'TestkategoriController@form')->name('admin.test_kategori.duzenle');
            Route::post('/duzenle{id?}', 'TestkategoriController@kaydet')->name('admin.test_kategori.kaydet');
            Route::get('/sil{id}', 'TestkategoriController@sil')->name('admin.test_kategori.sil');
            Route::get('/aktif{id}', 'TestkategoriController@aktif')->name('admin.test_kategori.aktif');
            Route::get('/pasif{id}', 'TestkategoriController@pasif')->name('admin.test_kategori.pasif');
        });


    });
});


Route::get('/', 'IndexController@index')->name('index');
Route::get('/iletisim', 'IletisimController@index')->name('iletisim');

Route::group(['prefix'=>'kullanici'], function (){
    Route::get('/giris', 'KullaniciController@giris')->name('kullanici.giris');
    Route::post('/giris', 'KullaniciController@giris');
    Route::get('/uyeol', 'KullaniciController@uyeol')->name('kullanici.uyeol');
    Route::post('/kaydol/{id?}', 'KullaniciController@kaydol')->name('kullanici.kaydol');
    Route::get('/cikis', 'KullaniciController@cikis')->name('kullanici.cikis');
});

Route::group(['prefix'=>'sss'], function (){
    Route::match(['get', 'post'], '/', 'SssController@index')->name('sss.index');
    Route::get('/filtrele/{id}', 'SssController@filtrele')->name('sss.filtrele');
});

Route::group(['prefix'=>'testler'], function (){
    Route::match(['get', 'post'], '/', 'TestlerController@index')->name('testler.index');
    Route::get('/filtrele/{id}', 'TestlerController@filtrele')->name('testler.filtrele');
    Route::get('/test/{id}', 'TestlerController@test')->name('testler.test');
    Route::post('/test', 'TestlerController@kaydet')->name('testler.kaydet');
    Route::get('/test_sonuc/{id}', 'TestlerController@test_sonuc')->name('testler.test_sonuc');
});


Route::group(['prefix'=>'ders_notlari'], function (){
    Route::match(['get', 'post'], '/', 'NotlarController@index')->name('ders_notlari.index');
    Route::get('/detay/{id}', 'NotlarController@detay')->name('ders_notlari.detay');
    Route::get('/filtrele/{id}', 'NotlarController@filtrele')->name('ders_notlari.filtrele');
    Route::post('/detay/{id?}', 'NotlarController@kaydet')->name('ders_notlari.kaydet');
});


Route::group(['prefix'=>'sorular'], function (){
    Route::match(['get', 'post'], '/', 'SorularController@index')->name('sorular.index');
    Route::get('/detay/{id}', 'SorularController@detay')->name('sorular.detay');
    Route::post('/detay/{id?}', 'SorularController@kaydet')->name('sorular.kaydet');
    /*
    Route::get('/ekle', 'SorularController@form')->name('admin.sorular.ekle');
    Route::get('/duzenle{id}', 'SorularController@form')->name('admin.sorular.duzenle');
    Route::post('/duzenle{id?}', 'SorularController@kaydet')->name('admin.sorular.kaydet');
    Route::get('/sil{id}', 'SorularController@sil')->name('admin.sorular.sil');
    Route::get('/aktif/{id}', 'SorularController@aktif')->name('admin.sorular.aktif');
    Route::get('/pasif/{id}', 'SorularController@pasif')->name('admin.sorular.pasif');
    */
});

Route::group(['prefix' => 'profil', 'namespace' => 'Profil'], function() {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/index', 'IndexController@index')->name('profil.index');
        Route::post('/kaydet', 'IndexController@kaydet')->name('profil.kaydet');

        Route::group(['prefix'=>'notlar'], function (){
            Route::match(['get', 'post'], '/', 'NotlarController@index')->name('profil.notlar.index');
            Route::get('/ekle', 'NotlarController@form')->name('profil.notlar.ekle');
            Route::get('/duzenle/{id}', 'NotlarController@form')->name('profil.notlar.duzenle');
            Route::post('/duzenle/{id?}', 'NotlarController@kaydet')->name('profil.notlar.kaydet');
            Route::post('/sebep/{id}', 'NotlarController@sebep')->name('profil.notlar.sebep');
            Route::get('/aktif/{id}', 'NotlarController@aktif')->name('profil.notlar.aktif');
            Route::get('/dosya/{id}', 'NotlarController@DosyaEkle')->name('profil.notlar.dosya');
            Route::post('/dosya', 'NotlarController@Dosyakaydet')->name('profil.notlar.Dosyakaydet');
        });

        Route::group(['prefix'=>'sorular'], function (){
            Route::match(['get', 'post'], '/', 'SorularController@index')->name('profil.sorular.index');
            Route::get('/ekle', 'SorularController@form')->name('profil.sorular.ekle');
            Route::post('/kaydet/{id?}', 'SorularController@kaydet')->name('profil.sorular.kaydet');
        });

        Route::group(['prefix'=>'testler'], function (){
            Route::match(['get', 'post'], '/', 'TestlerController@index')->name('profil.testler.index');
        });

        Route::group(['prefix'=>'satin_aldiklarim'], function (){
            Route::match(['get', 'post'], '/', 'SiparisController@index')->name('profil.satin_aldiklarim.index');
        });

        Route::group(['prefix'=>'satislarim'], function (){
            Route::match(['get', 'post'], '/', 'SiparisController@satislar')->name('profil.satislarim.index');
        });

        Route::group(['prefix'=>'odeme'], function (){
            Route::match(['get', 'post'], '/', 'OdemeController@index')->name('profil.odeme.index');
            Route::post('/odemeyap', 'OdemeController@odemeyap')->name('profil.odeme.odemeyap');
        });

        Route::group(['prefix' => 'sepet'], function (){
            Route::match(['get', 'post'], '/', 'SepetController@index')->name('profil.sepet.index');
            //Route::get('/', 'SepetController@index')->name('profil.sepet.index');
            Route::post('/ekle', 'SepetController@ekle')->name('profil.sepet.ekle');
            Route::delete('/kaldir/{rowid}', 'SepetController@kaldir')->name('profil.sepet.kaldir');
            Route::delete('/bosalt', 'SepetController@bosalt')->name('profil.sepet.bosalt');
            //Route::patch('/guncelle/{rowid}', 'SepetController@guncelle')->name('profil.sepet.guncelle');
        });


    });

});
