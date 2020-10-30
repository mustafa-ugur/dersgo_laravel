<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>@yield('title', config('app.name'))</title>
    <meta name="author" content="Mustafa Uğur" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bs4-extended.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />


    <link rel="stylesheet" href="/assets/css/style.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


    <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/fav//apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/fav//apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/fav//apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/fav//apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/fav//apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/fav//apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/fav//apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/fav//apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/images/fav//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/fav//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/fav//favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/fav//favicon-16x16.png">
    <link rel="manifest" href="/assets/images/fav//manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/images/fav//ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

</head>
<body>

@include('partial.header')
@yield('content')
@include('partial.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/css/toggle/accordion-menu.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="/assets/src/rating.js"></script>
<link rel="stylesheet" href="/assets/src/rating.css" type="text/css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script type="text/javascript">

    $(function(){
        $('.container1').rating();
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Lütfen Oda Seçiniz ! ",
            allowClear: true
        });
    });


    $(document).ready(function() {
        $(".open-dialog").fancybox();
    });

/*    jQuery(document).ready(function() {





        $('select[name=fiyat]').change(function(e){
            var  url = $(this).data('url');
            var veri = $(this).find('option:selected').val();
            if (veri != 0){
                location.href = BaseURL + 'ders_notlari.html/'+veri;
            }
            else {
                location.href = BaseURL + 'ders_notlari.html';
            }
        });


    });*/

    //il ilçe seçimi
    $.getJSON("/assets/il-bolge.json", function(sonuc){
        $.each(sonuc, function(index, value){
            var row="";
            row +='<option value="'+value.il+'">'+value.il+'</option>';
            $("#il").append(row);
        })
    });


    $("#il").on("change", function(){
        var il=$(this).val();

        $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
        $.getJSON("/assets/il-ilce.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                if(value.il==il)
                {
                    row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                    $("#ilce").append(row);
                }
            });
        });
    });

    $.getJSON("/assets/il-bolge.json", function(sonuc){
        $.each(sonuc, function(index, value){
            var row="";
            row +='<option value="'+value.il+'">'+value.il+'</option>';
            $(".il").append(row);
        })
    });


    $(".il").on("change", function(){
        var il=$(this).val();

        $(".ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
        $.getJSON("/assets/il-ilce.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                if(value.il==il)
                {
                    row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                    $(".ilce").append(row);
                }
            });
        });
    });

</script>


</body>
</html>
