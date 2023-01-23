jQuery(function($) {
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