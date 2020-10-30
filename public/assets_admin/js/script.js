

$(window).ready(function(e) {

    $.videoget = {

        'queryString':function (url) {


            var vars = [], hash; //vars arrayi ve hash deÄŸiÅŸkeni tanÄ±mlÄ±yoruz
            var hashes = url.slice(url.indexOf('?') + 1).split('&'); //QueryString deÄŸerlerini ayÄ±klÄ±yoruz.
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1]; //DeÄŸerlerimizi dizimize ekliyoruz
            }
            return vars;
        }

        ,
        'youtube': function(f,url,type,idDil){
            var  ID =   $.videoget.queryString(url);
            var adresyeni = "https://www.googleapis.com/youtube/v3/videos?id="+ID['v']+"&key=AIzaSyBNpTa1aMjN8Td6PxfkWrr7WMgS8oRjaK0&part=snippet,contentDetails,statistics,status";
            $.getJSON(adresyeni,
                function(gelen){
                    console.log(gelen);
                    if(gelen.items.length>0) {
                        var imageurl = ((typeof(gelen.items[0].snippet.thumbnails.maxres)!="undefined" && gelen.items[0].snippet.thumbnails.maxres!=="") ? gelen.items[0].snippet.thumbnails.maxres.url:
                            ((typeof(gelen.items[0].snippet.thumbnails.standard)!="undefined" && gelen.items[0].snippet.thumbnails.standard!=="") ? gelen.items[0].snippet.thumbnails.standard.url:
                                ((typeof(gelen.items[0].snippet.thumbnails.high)!="undefined" && gelen.items[0].snippet.thumbnails.high!=="") ? gelen.items[0].snippet.thumbnails.high.url:
                                    ((typeof(gelen.items[0].snippet.thumbnails.medium)!="undefined" && gelen.items[0].snippet.thumbnails.medium!=="") ? gelen.items[0].snippet.thumbnails.medium.url:
                                        gelen.items[0].snippet.thumbnails.default.url))));

                        $("#baslik_"+idDil).val(gelen.items[0].snippet.title);
                        $("#videoResim_"+idDil).val(imageurl);
                        if( $('.imgresim').length>0)  $('.imgresim').remove();
                        $("#videoResim_"+idDil).before('<img src="'+imageurl+'" class="imgresim">');
                        $("#ozet_"+idDil).val(gelen.items[0].snippet.description.replace("&#39;","'"));
                        $("#embed_"+idDil).val('<iframe width="560" height="315" src="http://www.youtube.com/embed/'+gelen.items[0].id+'?theme=light&color=white&showinfo=0&modestbranding=0&version=3&controls=2&autohide=1&hd=1" frameborder="0" allowfullscreen></iframe>');
                    }
                    else
                    { alert('Veri AlÄ±namadÄ±');}

                }
            );




        },
        'vimeo': function(f,url,type,idDil){
            var adresyeni =  "http://vimeo.com/api/oembed.json?url="+url;
            $.getJSON(adresyeni,function(gelen){

                $("#baslik_"+idDil).val(gelen.title);
                $("#ozet_"+idDil).val(gelen.description);
                if( $('.imgresim').length>0)  $('.imgresim').remove();
                $("#videoResim_"+idDil).before('<img src="'+gelen.thumbnail_url+'" class="imgresim">');
                $("#videoResim_"+idDil).val(gelen.thumbnail_url);
                $("#embed_"+idDil).val('<iframe src="http://player.vimeo.com/video/'+gelen.video_id+'?color=c9c9c9&title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ');
            });





        },
        'dailymotion': function(f,url,idDil){
            var adresyeni =  "http://www.dailymotion.com/services/oembed?url="+url;
            $.ajax(
                {
                    url:adresyeni,
                    type:'GET',
                    dataType:'jsonp',
                    success:function(gelen){
                        $("#baslik_"+idDil).val(gelen.title);
                        $("#videoResim_"+idDil).val(gelen.thumbnail_url);
                        if( $('.imgresim').length>0)  $('.imgresim').remove();
                        $("#videoResim_"+idDil).before('<img src="'+gelen.thumbnail_url+'" class="imgresim">');
                        $("#ozet_"+idDil).val(gelen.description);
                        $("#embed_"+idDil).val(gelen.html);
                    }});




        },

        'vidivodo': function(f,url,idDil){
            var adresyeni =  "https://www.vidivodo.com/oembed?url="+url+'&format=json';
            $.ajax(
                {
                    url:adresyeni,
                    type:'GET',
                    dataType:'json',
                    success:function(gelen){
                        $("#baslik_"+idDil).val(gelen.title);
                        $("#videoResim_"+idDil).val(gelen.thumbnail_url);
                        if( $('.imgresim').length>0)  $('.imgresim').remove();
                        $("#videoResim_"+idDil).before('<img src="'+gelen.thumbnail_url+'" class="imgresim">');
                        $("#ozet_"+idDil).val(gelen.description);
                        $("#embed_"+idDil).val(gelen.html);
                    }});




        },
        'izlesene': function(f,url,idDil){
            var adresyeni =  "https://www.izlesene.com/oembed?url="+url+'&format=json';
            $.ajax(
                {
                    url:adresyeni,
                    type:'GET',
                    dataType:'json',
                    success:function(gelen){
                        $("#baslik_"+idDil).val(gelen.title);
                        $("#videoResim_"+idDil).val(gelen.thumbnail_url);
                        if( $('.imgresim').length>0)  $('.imgresim').remove();
                        $("#videoResim_"+idDil).before('<img src="'+gelen.thumbnail_url+'" class="imgresim">');
                        $("#ozet_"+idDil).val(gelen.description);
                        $("#embed_"+idDil).val(gelen.html);


                    }});




        },
        'default': function(f,url,idDil){
            var adresyeni =  "http://api-cdn.embed.ly/1/oembed?card=1&key=fd92ebbc52fc43fb98f69e50e7893c13&native=true&scheme=http&urls="+url+'&v=2&youtube_showinfo=0';
            $.ajax(
                {
                    url:adresyeni,
                    type:'GET',
                    dataType:'json',
                    success:function(gelen){
                        $("#baslik_"+idDil).val(gelen[0].title);
                        $("#videoResim_"+idDil).val(gelen[0].thumbnail_url);
                        if( $('.imgresim').length>0)  $('.imgresim').remove();
                        $("#videoResim_"+idDil).before('<img src="'+gelen[0].thumbnail_url+'" class="imgresim">');
                        $("#ozet_"+idDil).val(gelen[0].description);
                        $.embed.embedCode($("#embed_"+idDil),gelen,url);


                    }});




        },


        'url' : function(url,idDil)
        {


            url_1 = url.split('.');
            url_1 = url_1 [url_1 .length-2].split("/");
            url_1 = url_1 [url_1 .length-1];

            switch (url_1)
            {
                case 'youtube':
                case 'youtu':
                    $.videoget.youtube(this,url,url_1,idDil);
                    break;
                case 'vimeo':
                    $.videoget.vimeo(this,url,url_1,idDil);
                    break;
                case 'dai':
                case 'dailymotion':
                    $.videoget.dailymotion(this,url,idDil);
                    break;
                case 'vidivodo':
                    $.videoget.vidivodo(this,url,idDil);
                    break;
                case 'izlesene':
                    $.videoget.izlesene(this,url,idDil);
                    break;
                default:
                    $.videoget.default(this,url,idDil);
                    break;

            }

        }




    }



    $('.verial').click(function(e) {
        var dil = $(this).attr('data-lang');
        $.videoget.url($('#adres_'+dil).val(),dil);
        return false;
    });


    $.embed = {

        'embedCode' : function (t,data,url) {

            switch (data[0].provider_name)
            {
                case 'Milligazete':
                    $(t).val($.embed.milligazete(url));
                    break;

                case 'www.milliyet.com.tr':
                    $(t).val($.embed.ajax(t,data,'milliyet'));
                    break;
                case 'Beyazperde':
                    $(t).val($.embed.beyazperde(data));
                    break;
                case 'aksam.com.tr':
                    $.embed.ajax(t,data,'aksam');
                    break;
                case 'Sinemalar.com':
                    $.embed.ajax(t,data,'sinemalar');
                    break;
                case 'SÃ¶zcÃ¼ TV':
                    $.embed.ajax(t,data,'sozcu');
                    break;
                case 'www.haberturk.com':
                    $(t).val($.embed.haberturk(data));
                    break;
                case 'sabah.com.tr':
                    $(t).val($.embed.sabah(data));
                    break;
                case 'Periscope':
                    $(t).val($.embed.Periscope(data));
                    break;
                case 'Ä°zleyin':
                    $(t).val($.embed.izleyin(data));
                    break;
                case 'Haber7':
                    $(t).val($.embed.Haber7(data));
                    break;
                case 'hurriyettv':
                    $(t).val($.embed.hurriyettv(data));
                    break;
                default:
                    $(t).val($.embed.default(data));
                    break;

            }


        },
        'return':function (t,data,type) {


            if(typeof data == "string" && data){
                switch (type) {
                    case 'aksam':
                        $(t).val('<iframe '+data+'iframe>');
                        break;
                    default:
                        $(t).val('<iframe width="640" height="362" frameborder="0" scrolling="no" allowfullscreen="" src="'+data+'"></iframe>');
                        break;

                }
            }


        },

        'default':function (data) {
            var embed = decodeURIComponent(data[0].html.replace('http://cdn.embedly.com/widgets/media.html?src=',''));
            embed = embed.split('&');
            return embed[0]+'" width="1280" height="720" scrolling="no" frameborder="0" allowfullscreen></iframe>';
        },
        'milligazete':function (data) {

            return '<iframe src="'+data+'&RVPInstanceName=player1&RVPPlaylistId=0&RVPVideoId=0" width="978" height="598" frameborder="0" scrolling="no" allowfullscreen></iframe>';
        },

        'hurriyettv':function(data)
        {
            var id = data[0].url;
            id = id.split('_');
            id  = id[id.length-1];
            return '<iframe src="http://webtv.hurriyet.com.tr/embed/?vid='+id+'&resizable=1&autostart=scroll" width="100%" height="326" data-original-url="'+data[0].url+'" data-poster-url="'+data[0].thumbnail_url+' frameborder="0" scrolling="no" allowfullscreen></iframe>';
        },
        'beyazperde':function (data) {
            var id = data[0].url;
            id = id.split('/');
            id  = id[id.length-2];
            id = id.split('-');
            id = id[1];

            return '<iframe src="http://www.beyazperde.com/_video/iblogvision.aspx?cmedia='+id+'" style="width:640px; height:360px"></iframe>';



        },
        'Haber7':function (data) {


            var id = data[0].url;
            id = id.split('/');
            id  = id[id.length-1];
            id = id.split('-');


            return '<iframe src="http://video.haber7.com/embed/'+id[0]+'" framespacing="0" frameborder="no" scrolling="no" width="628" height="353"></iframe>';
        },
        'izleyin':function (data) {
            var id = data[0].url;
            id = id.split('/');
            id  = id[id.length-1];

            return '<iframe width="560" height="315" src="http://www.izleyin.com/embed/'+id+'" scrolling="no" frameborder="0"></iframe>';
        },
        'Periscope':function (data) {
            return data[0].url;
        },
        'sabah':function (data) {
            return '<iframe src="'+data[0].url.replace('webtv/','webtv/iframe/')+'" width="642" height="361" border="0" scrolling="no"></iframe>';
        },
        'haberturk':function (data) {
            var id = data[0].url;
            id = id.split('/');
            id  = id[id.length-1];

            return '<iframe src="http://www.haberturk.com/video/video/embed/'+id+'" width="642" height="361" border="0" scrolling="no"></iframe>';
        },
        'ajax':function (t,data,type) {
            $.ajax({

                url:'?cmd=Files/Get',
                type:'GET',
                data:'url='+data[0].url+'&type='+type,
                success:function(g)
                {
                    $.embed.return(t,g,type);
                }


            });


        }


    }


});










