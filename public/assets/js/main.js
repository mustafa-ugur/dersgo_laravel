// tab menü

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
    //document.getElementById("defaultOpen").click();


    // tab menü
    jQuery(document).ready(function($) {
        $('#owl-dersler').owlCarousel({
            margin:20,
            nav:true,
            autoplay:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:2
                },
                800:{
                    items:3
                },
            }
        });

    //accordion menü
        var allPanels = $(".accordion > dd").hide();
        $(".accordion > dt > a").click(function () {
            var current = $(this).parent().next("dd");
            $(this).parents(".accordion").find("dt > a").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
            $(this).parent().next().slideDown("easeOutExpo");
            return false;
        });


    //counter
    $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
      $('.counter').addClass('animated fadeInDownBig');
      $('h3').addClass('animated fadeIn');

      
    });

