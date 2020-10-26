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

  //Swiper Js for Become Creator
  var swiper = new Swiper('.la-mcard__container', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  //Swiper Js for Learning Plans
  var swiper = new Swiper('.la-choose__slider', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

//Swiper Js for Price
    var swiper = new Swiper('.la-price__slider', {
      direction: 'vertical',
      slidesPerView: 1,
      spaceBetween: 30,
      mousewheel: true,
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
      },
      breakpoints:{
        320:{
          spaceBetween: 380,
        },
        1024:{
          spaceBetween: 30,
        }
      },
  });

  // Rating 
  $("#rateYo").rateYo({
    rating: 3.5,
    readOnly: true,
    starWidth: "18px",
    normalFill: "#D5D5D5",
    ratedFill: "#FFC516"
  });

}); 

// Popover Js for Dashboard Page: Start
$('[data-toggle="popover"]').popover();
// Popover Js for Dashboard Page: End

 
