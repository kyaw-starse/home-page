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
    // Tabs Jquery
    $(function() {
        $(".tabs a").on('click', function(e) {
          e.preventDefault();
          var target = $(this).attr('href');
          if (!$(target).length) return false;
          $('.tab', $(this).closest('.tabs')).removeClass('active');
          $(this).closest('.tab').addClass('active');
          $('.panel', $(target).closest('.panels')).removeClass('active');
          $(target).addClass('active');
        });
    });

    function HeaderScrollTop() {
        var hscroll = $(window).scrollTop();
        var mywidth = $(window).width();
        if(mywidth > 768){
            if(hscroll >= 100){
                $('.headerBlock').addClass('headerFixed');
            }
            else {
                $('.headerBlock').removeClass('headerFixed');
            }
        }
    }
    
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
        HeaderScrollTop();
        PageTopAnime();
    });

    // ページが読み込まれたらすぐに動かしたい場合の記述
    $(window).on('load', function () {
        HeaderScrollTop();
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


