jQuery(function($) {
    $(function() {
        var scroll_func = function() {
            $('html,body').animate({ scrollTop: $($(this).attr("href")).offset().top }, 'slow', 'swing');
            return false;
        }
        $(function() {
            $('.anchor').click(scroll_func);
        });
    });
    $(function () {
        $(document).on('click', '.gmenu', function(){
            $('.gmenu').addClass('is-active');
            $('.globalNav').addClass('open');
        });
        $(document).on('click', '.is-active', function(){
            $('.gmenu').removeClass('is-active');
            $('.globalNav').removeClass('open');
        });
    });
    
    // $(document).ready(function(){
    //     $('.mv-slider').slick({
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         arrows: false,
    //         dots: false,
    //         draggable:false,
    //         autoplay: true,
    //         autoplaySpeed: 1000,
    //         responsive: [{
    //           breakpoint: 768,
    //           settings: {
    //             swipeToSlide: true,
    //             mobileFirst: true
    //           }
    //         }]
    //     });
    // });
    $(function () {
        var target = $(".content");
        var el = target.offset().top;
        el = el - 100;
        var headerBlock = $(".headerBlock");
        $(window).scroll(function () {
            var scroll = $(this).scrollTop();
            if (scroll > el) {
                headerBlock.addClass("headerBg");
            }
            else {
                headerBlock.removeClass("headerBg");
            }
        });
    });
    $(function() {
        $(".c-sidebarList li a").on('click', function(e) {
            e.preventDefault();
            if($(".c-sidebarList li a").hasClass("sidebarActive")){
                $(".c-sidebarList li a").removeClass('sidebarActive');
                $(this).addClass('sidebarActive');
            }
            else {
                $(this).addClass('sidebarActive');
            }
        });
    });
    $(function(){
        AOS.init({
            offset: 200,
            duration: 600,
            easing: 'ease-in-sine',
            delay: 100,
        });
    });
    
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
    //Page top scroll
    function PageTopAnime() {
        var scroll = $(window).scrollTop();
        if (scroll >= 200){
            $('#page-top').removeClass('RightMove');
            $('#page-top').addClass('LeftMove');
        }else {
            if($('#page-top').hasClass('LeftMove'))
            {
                $('#page-top').removeClass('LeftMove');
                $('#page-top').addClass('RightMove');
            }
        }
    }

    // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function () {
        PageTopAnime();
    });

    // ページが読み込まれたらすぐに動かしたい場合の記述
    $(window).on('load', function () {
        PageTopAnime();
    });

    // #page-topをクリックした際の設定
    $('#page-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    //Page top scroll
});


