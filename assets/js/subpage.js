jQuery(function($) {
    // rollAnimeにrollというクラス名を付ける定義
    function RollAnimeControl() {
        $('.rollAnime').each(function () {
            var elemPos = $(this).offset().top - 50;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            var childs = $(this).children();
            if (scroll >= elemPos - windowHeight) {
                $(childs).each(function (i) {
                    if (i < 10) {
                    $(this).css("transition-delay","."+i+"s");
                    }else {
                        var n = i / 10;
                        $(this).css("transition-delay",n+"s");
                    }
                });
                
                $(this).addClass("roll");

            } else {
                $(childs).each(function () {
                    $(this).css("transition-delay","0s");
                });
                $(this).removeClass("roll");
            }
        });
    }

    $(window).on('load',function(){
        $("#splash-logo").delay(600).fadeOut('slow');

        //spanタグを追加する
        var element = $(".rollAnime");
        element.each(function () {
            var text = $(this).text();
            var textbox = [];
            text.split('').forEach(function (t, i) {
                if (t !== " ") {
                    if (i < 10) {
                        textbox += '<span style="transition-delay:.' + i + 's;">' + t + '</span>';
                    } else {
                        var n = i / 10;
                        textbox += '<span style="transition-delay:' + n + 's;">' + t + '</span>';
                    }

                } else {
                    textbox += t;
                }
            });
            $(this).html(textbox);
        });

        RollAnimeControl();
        $("#splash").css("display","block");
        $("#splash").delay(600).fadeOut('slow',function(){
        
            $('body').addClass('appear');
            
            var h = $(window).height();
            $(".splashbg").css({
                "border-width":h,
                "animation-name":"backBoxAnime"
            });	

        });  

    });
    $(document).ready(function() {
        $("#splash").delay(600).fadeOut('slow',function(){
        
            $('body').addClass('appear');
            
            var h = $(window).height();
            $(".splashbg").css({
                "border-width":h,
                "animation-name":"backBoxAnime"
            });	

        });  
      });
    $(function () {
        var particles = Particles.init({
            selector: '.particlesBg',
            maxParticles: 120,
            sizeVariations: 5,
            // color: ['#00d200', '#008600', '#ffedae' , '#00aa01','#008135'],
            color: ['#a3fea3', '#8bfc8b'],
            connectParticles: true,
            minDistance: 150,
            responsive: [
                {
                    breakpoint: 768,
                    options: {
                        maxParticles: 50,
                        minDistance: 80,
                    }
                }
            ]
        });
    });
    $(function () {
        $('.accordian-title').on('click', function() {
            $('.accordian-box').slideUp(500);
                
            var findElm = $(this).next(".accordian-box");
                
            if($(this).hasClass('acc-close')){
                $(this).removeClass('acc-close');
            }else{
                $('.acc-close').removeClass('acc-close');
                $(this).addClass('acc-close');
                $(findElm).slideDown(500);
            }
        });
        $(window).on('load', function(){
            $('.accordion-area li:first-of-type .accordian-div').addClass("open");
            $(".open").each(function(index, element){
                var Title =$(element).children('.accordian-title');
                $(Title).addClass('acc-close');
                var Box =$(element).children('.accordian-box');
                $(Box).slideDown(500);
            });
        });
    });
    // Business Page Circle Block height
    $(function () {
        function CircleHeight(){
            $bussCirWidth = $('.circle-block').width();
            $('.circle-block').css({ "height": $bussCirWidth });
        }
        CircleHeight();
        $( window ).resize(function() {
            CircleHeight();
        });
    });
    

});