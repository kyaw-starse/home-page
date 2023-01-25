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
        $("#splash-logo").delay(1000).fadeOut('slow');

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
        $("#splash").delay(1000).fadeOut('slow',function(){
        
            $('body').addClass('appear');
            
            var h = $(window).height();
            $(".splashbg").css({
                "border-width":h,
                "animation-name":"backBoxAnime"
            });	

        });  

    });
    /*=========== odometer js ==============*/
    $(function(){
        var memberBlockTarget = $(".sec-people");
        var mbt = memberBlockTarget.offset().top;
        mbt = mbt - 100;
        $(window).scroll(function () {
            var scroll = $(this).scrollTop();
            if (scroll > mbt) {
                setTimeout(function(){
                    var el1 = document.querySelector('.odometer-a1');
                    od1 = new Odometer({
                        el: el1,
                    });
                    el1.innerHTML = 55
        
                    var el2 = document.querySelector('.odometer-a2');
                    od2 = new Odometer({
                        el: el2,
                    });
                    el2.innerHTML = 20
        
                    var el3 = document.querySelector('.odometer-a3');
                    od3 = new Odometer({
                        el: el3,
                    });
                    el3.innerHTML = 10
        
                    var el4 = document.querySelector('.odometer-a4');
                    od4 = new Odometer({
                        el: el4,
                    });
                    el4.innerHTML = 10

                    var el5 = document.querySelector('.odometer-b3');
                    od5 = new Odometer({
                        el: el5,
                    });
                    el5.innerHTML = 5
        
                    var el6 = document.querySelector('.odometer-b1');
                    od6 = new Odometer({
                        el: el6,
                    });
                    el6.innerHTML = 5

                    var el7 = document.querySelector('.odometer-b2');
                    od7 = new Odometer({
                        el: el7,
                    });
                    el7.innerHTML = 5

                    var el8 = document.querySelector('.odometer-b4');
                    od8 = new Odometer({
                        el: el8,
                    });
                    el8.innerHTML = 5

                }, 50);
            }
        });
    });
});