@extends('partial.master')
@section('title', 'Dökümantasyon Ekle | Dersgo')
@section('content')

    <style>
        .table .thead-dark th {
            color: #fff;
            background-color: #7a1878;
            border-color: #7a1878;
        }

    </style>

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




    <section class="pcoded-main-container">
        <div class="pcoded-content">

            <div class="container">
                <div class="col-sm-12">
                    <div class="card" style="border: none;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> {{ $notlar->baslik }} / Dökümantasyon Ekleme </h3>
                            </div>
                            <div class="panel-body">
                                <br />
                                <form method="post" action="{{ route('profil.notlar.Dosyakaydet') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3" align="right"><h4>Seç</h4></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="data_id" value="{{ $notlar->id }}"/>
                                            <input type="file" name="resim[]" id="file" multiple/>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" name="upload" value="Yükle" class="btn btn-success" />
                                        </div>
                                    </div>
                                </form>
                                <br />
                                <div class="progress">
                                    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        0%
                                    </div>
                                </div>
                                <br />
                                <div id="success" class="row">

                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Dosya Adı</th>
                            <th>Dosya İndir</th>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                            @foreach($resimler as $resim)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $resim->resim }}</td>
                                    <td><a href="/upload/notlar/{{ $resim->resim }}" target="_blank"> <i class="fa fa-file"></i> </a></td>
                                </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('form').ajaxForm({
                beforeSend:function(){
                    $('#success').empty();
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                },
                uploadProgress:function(event, position, total, percentComplete){
                    $('.progress-bar').text(percentComplete + '0%');
                    $('.progress-bar').css('width', percentComplete + '0%');
                },
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                        $('#success').append(data.image);
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                    }
                }
            });
        });
    </script>
@endsection
