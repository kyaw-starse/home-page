jQuery(function($) {
  var slideWrapper = $(".full-wide-slider"),
  iframes = slideWrapper.find('.embed-player'),
  lazyImages = slideWrapper.find('.slide-image'),
  lazyCounter = 0;

  // POST commands to YouTube or Vimeo API
  function postMessageToPlayer(player, command){
    if (player == null || command == null) return;
    player.contentWindow.postMessage(JSON.stringify(command), "*");
  }

  //When the slide is changing
  function changeSlide(slick, control){
    var currentSlide, slideType, startTime, player, video;

    currentSlide = slick.find(".slick-current");
    slideType = currentSlide.attr("class").split(" ")[1];
    player = currentSlide.find("iframe").get(0);
    startTime = currentSlide.data("video-start");
  }
  // DOM Ready
  $(function() {
    // Initialize
    slideWrapper.on("init", function(slick){
      slick = $(slick.currentTarget);
      setTimeout(function(){
        changeSlide(slick,"play");
      }, 1000);
      // resizePlayer(iframes, 16/9);
    });
    slideWrapper.on("beforeChange", function(event, slick) {
      slick = $(slick.$slider);
      changeSlide(slick,"pause");
    });
    slideWrapper.on("afterChange", function(event, slick) {
      slick = $(slick.$slider);
      changeSlide(slick,"play");
    });
    slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
      lazyCounter++;
      if (lazyCounter === lazyImages.length){
        lazyImages.addClass('show');
        slideWrapper.slick("slickPlay");
      }
    });

    //start the slider
    slideWrapper.slick({
      fade:true,
      draggable: true,
      autoplay: true,
      autoplaySpeed:7000,
      lazyLoad:"progressive",
      speed:500,
      arrows:false,
      dots:false,
      infinite: true,
      cssEase: 'ease-in-out'
      // cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
    });
  });

});