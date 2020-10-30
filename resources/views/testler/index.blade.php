@extends('partial.master')
@section('title', 'Testler')
@section('content')

    <style>
        #accordion {
            visibility: hidden;
            font-weight: normal;
            font-size: medium;
            font-family: 'Lucida Grande', Geneva, Candara, Tahoma, sans-serif;
            color: black;
            background-color: #fff;
        }
        #accordion .top > div {
            background-color: #fff;
        }
        #accordion .top > ul {
            border-top: 1px solid #ddd;
        }
        #accordion p {
            border-top: 1px solid #ddd;
            padding: 10px 20px 0px 20px;
            margin: 6px 0 22px;
        }
        .sidebar {
            background: #fff;
            border-radius: 20px;
            min-height: 300px;
            padding: 0;
            color: #fff;
        }

        .sidebar .sidebarTitle {
            font-size: 20px;
            color: #000;
            font-weight: 900;
            padding: 10px 0px;
            margin: 0 auto;
            display: table;
            margin-bottom: 20px;
        }
        .sidebar .sidebarContent ul li a.active {
            color: #791878;
        }
        .sidebar .sidebarContent ul li a {
            color: #111;
            font-family: 'Quicksand', sans-serif;
            font-size: 15px;
            font-weight: 100;
        }
    </style>
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1> TESTLER </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </section>

    <section class="test">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar" style="background: #fff;">
                        <div class="logo">
                            <img src="/assets/images/logo.png" style="margin: 0 auto; display: table; padding: 10px;">
                        </div>
                        <div class="sidebarTitle">
                            <h1> BÖLÜMLER </h1>
                        </div>
                        <div class="sidebarContent" style="display: block;">
                            <div id="accordion">
                                <ul>
                                    @foreach($kategoriler as $kategori)
                                        <li>
                                            <div>{{ $kategori->kategori }}</div>
                                            <ul>
                                                @foreach($kategori->alt_kategoriler as $kate)
                                                    <li>
                                                        <div>{{ $kate->kategori }} </div>
                                                        <p>
                                                            @foreach($kate->alt_kategoriler as $kat)
                                                                <a href="{{ route('ders_notlari.filtrele', $kat->id) }}"> {{ $kat->kategori }} </a>
                                                            @endforeach
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="accordionMenu">
                        <div class="accordion">
                            @foreach($testler as $test)
                            <div class="dt">
                                <a href="{{ route('testler.test', $test->id) }}" class=""> {{ $test->baslik }} </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
