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
                    var el1 = document.querySelector('.odometer1');
                    od1 = new Odometer({
                        el: el1,
                    });
                    el1.innerHTML = 55
        
                    var el2 = document.querySelector('.odometer2');
                    od2 = new Odometer({
                        el: el2,
                    });
                    el2.innerHTML = 20
        
                    var el3 = document.querySelector('.odometer3');
                    od3 = new Odometer({
                        el: el3,
                    });
                    el3.innerHTML = 10
        
                    var el4 = document.querySelector('.odometer4');
                    od4 = new Odometer({
                        el: el4,
                    });
                    el4.innerHTML = 10
        
                    var el5 = document.querySelector('.odometer5');
                    od5 = new Odometer({
                        el: el5,
                    });
                    el5.innerHTML = 5
                }, 50);
            }
        });
        
    });
    // function smartRollover() {
    //     if (document.getElementsByTagName) {
    //         var images = document.getElementsByTagName("img");

    //         for (var i = 0; i < images.length; i++) {
    //             if (images[i].getAttribute("src").match("_off.")) {
    //                 images[i].onmouseover = function() {
    //                     this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));
    //                 }
    //                 images[i].onmouseout = function() {
    //                     this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));
    //                 }
    //             }
    //         }
    //     }
    // }

    // if (window.addEventListener) {
    //     window.addEventListener("load", smartRollover, false);
    // } else if (window.attachEvent) {
    //     window.attachEvent("onload", smartRollover);
    // }

});


