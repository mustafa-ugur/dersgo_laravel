@extends('partial.master')
@section('title', $kategori->baslik.' | Dersgo')
@section('content')
    <section class="ustBanner">
        <div class="container">
            <div class="text">
                <h1> TESTLER </h1>
                <p>{{ $kategori->baslik }}</p>
            </div>
        </div>
    </section>

    <section class="test_detay">
        <div class="container">
            <form>
                @php
                    $cevap = \Illuminate\Support\Facades\DB::selectOne('SELECT * FROM test_cevaplari WHERE id = 1');
                    $etiketler = $cevap->cevap;
                    $parcala = explode(",", $etiketler);
                    $testler = \Illuminate\Support\Facades\DB::select('SELECT * FROM testler WHERE kid = 1 ');
                         $i = 1;
                         $soruno = 0;
                         $svgdiv ='<svg class="check" viewbox="0 0 40 40">
                         <defs>
                             <linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
                             <stop offset="0%" stop-color="#7a1878"></stop>
                             <stop offset="100%" stop-color="#da1b60"></stop>
                             </linearGradient>
                         </defs>
                         <circle id="border" r="18px" cx="20px" cy="20px"></circle>
                         <circle id="dot" r="8px" cx="20px" cy="20px"></circle>
                         </svg>' ;
                         $imgtrue ='<img class="imgtrue" src="/assets/images/true.png">';
                         $imgfalse ='<img class="imgtrue" src="/assets/images/false.png">';
                         foreach ($testler as $test) {
                             ($parcala != $test->dogru) ? $yanlis_cevap = $parcala : "";

                echo '

                 <div class="col-md-12">
                    <div class="sorular">
                        <span class="soruicon flaticon-edit">  Soru   </span>
                <div class="icerik">
                    <h3 class="sorutext"> '.$test->soru .' </h3>
                    <div class="radiobtn">
                        <input type="radio" name="cevap['.$i.']"  value="a" id="Unoa'.$i.'"  '.($parcala == "a") ? "checked" : "disabled" .'/>
                        <label for="Unoa'.$i.'">
                           '.($test->dogru == "a" ) ? $imgtrue : "".'
                            '.($yanlis_cevap == "a") ? $imgfalse : " ".'
                            '.$test->dogru != "a" && $yanlis_cevap != "a" ? $svgdiv : "".'
                            A : '.$test->a.'
                        </label>
                        <input type="radio" name="cevap['.$i.']"  value="b" id="Unob'.$i.'" '.($parcala == "b" ) ? "checked" : "disabled" .'/>
                        <label for="Unob'.$i.'">
                            '.($test->dogru != "b" && $yanlis_cevap != "b") ? $svgdiv : "" .'
                            '.($test->dogru == "b")  ? $imgtrue : "" .'  '.($yanlis_cevap == "b") ? $imgfalse : " " .'    B : '.$test->b.'
                        </label>
                        <input type="radio" name="cevap['.$i.']"  value="c" id="Unoc'.$i.'" '.$parcala == "c" ? "checked" : "disabled" .' />
                        <label for="Unoc'.$i.'">
                            '.($test->dogru != "c" && $yanlis_cevap != "c")  ? $svgdiv : "" .'
                            '.($test->dogru == "c") ? $imgtrue : "" .'   '.($yanlis_cevap == "c") ? $imgfalse : " " .'  C : '.$test->c.'
                        </label>

                        <input type="radio" name="cevap['.$i.']"  value="d" id="Unod'.$i.'" '.($parcala == "d") ? "checked" : "disabled" .'/>
                        <label for="Unod'.$i.'">
                            '.($test->dogru != "d" && $yanlis_cevap != "d")  ? $svgdiv : "" .'
                            '.($test->dogru == "d") ? $imgtrue : "" .'   '.($yanlis_cevap == "d") ? $imgfalse : " " .'  D : '.$test->d.'
                        </label>
                        <input type="radio" name="cevap['.$i.']"  value="e" id="Unoe'.$i.'" '.$parcala == "e" ? "checked" : "disabled" .'/>
                        <label for="Unoe'.$i.'">
                            '.($test->dogru != "e" && $yanlis_cevap != "e")  ? $svgdiv : "" .'
                            '.($test->dogru == "e") ? $imgtrue : "" .'  '.($yanlis_cevap == "e")  ? $imgfalse : " " .'   E : '.$test->e.'
                        </label>
                </div>
        </div>
        </div>
                ';

                $i++;  $yanlis_cevap=""; }

                    @endphp
            </form>
        </div>
    </section>

@endsection
