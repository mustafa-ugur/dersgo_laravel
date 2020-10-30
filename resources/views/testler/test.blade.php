@extends('partial.master')
@section('title', $item->baslik.' | Dersgo')
@section('content')
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1> TESTLER </h1>
                <p>{{ $item->baslik }}</p>
            </div>
        </div>
    </section>

    <section class="test_detay">
        <div class="container">
            <form id="test" action="{{ route('testler.kaydet') }}" method="POST">
                {{ csrf_field() }}
                @php $i = 1; @endphp
                @foreach($testler as $test)
                <div class="col-md-12">
                    <div class="sorular">
                        <span> #{{ $i }} </span>
                        <div class="icerik">
                            <h3> {{ $test->soru }} </h3>
                            <a href=""> A : <input type="checkbox" name="cevap[]" value="a"> {{ $test->a }} </a>
                            <a href=""> B : <input type="checkbox" name="cevap[]" value="b"> {{ $test->b }} </a>
                            <a href=""> C : <input type="checkbox" name="cevap[]" value="c"> {{ $test->c }} </a>
                            <a href=""> D : <input type="checkbox" name="cevap[]" value="d"> {{ $test->d }} </a>
                            <a href=""> E : <input type="checkbox" name="cevap[]" value="e"> {{ $test->e }} </a>

                        </div>
                    </div>
                </div>
                    @php $i++; @endphp
                @endforeach
                <input type="hidden" value="{{ $item->id }}" name="test_id">
                <div class="butonlar">
                    <button style="width: 10%; background: #ddd; color: #333; border: none;" class="btn btn-uyeol"> Vazgeç </button>
                    <button style="width: 10%;" class="btn btn-uyeol loginBTN"> Sınavı Bitir </button>
                </div>
            </form>
        </div>
    </section>

@endsection
