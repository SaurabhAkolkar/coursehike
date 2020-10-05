$(function(){
    // Global Dropdown Toggle: Start
    $('.dropdown-toggle').dropdown()
    // Global Dropdown Toggle: End

    //Swiper Js for Login & Register page
    var swiper = new Swiper('.entry-swiper-container', {
        fadeEffect: { crossFade: true },
        virtualTranslate: true,
        slideToClickedSlide: true,
        mousewheelControl: true,
        autoplayDisableOnInteraction: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        speed: 1000, 
        slidersPerView: 1,
        effect: "fade"
    });

    //Swiper Js for Artist gallery
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        // spaceBetween: 10,
        slidesPerView: 13,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });
      var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: galleryThumbs
        }
      });

      $("#rateYo").rateYo({
        starWidth: "15px",
        rating: 3.6,
        readOnly: true,
        normalFill: "#D5D5D5",
        ratedFill: "#FFC516"
    });

}); 