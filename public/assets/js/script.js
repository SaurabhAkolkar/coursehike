
(function ($) {
  "use strict";
  // var allcourse = JSON.parse(localStorage.getItem("allcourse")) || [];
  // var element = document.getElementById("cart_count");
  // $("#cart_count").addClass("bg-success");
  // element.innerHTML = [... new Set(allcourse)].length || "";



  //  Main Menu Offcanvas
  $('.primary-menu').find('li a').each(function () {
    if ($(this).next().length > 0) {
      $(this).parent('.header-navbar .primary-menu li .submenu li').append('<span class="menu-trigger"><i class="fal fa-angle-right"></i></span>');
    }
  });


  // expands the dropdown menu on each click
  // $('.primary-menu').find('li .menu-trigger').on('click', function (e) {
  //   e.preventDefault();
  //   $(this).toggleClass('open').parent('li').children('ul').stop(true, true).slideToggle(350);
  //   $(this).find("i").toggleClass("fa-angle-up fa-angle-down");
  // });



  // check browser width in real-time
  function breakpointCheck() {
    var windoWidth = window.innerWidth;
    if (windoWidth <= 991) {
      $('.header-navbar').addClass('mobile-menu');
    } else {
      $('.header-navbar').removeClass('mobile-menu');
    }
  }

  breakpointCheck();
  $(window).on('resize', function () {
    breakpointCheck();
  });


  $('.nav-toggler').on('click', function (e) {
    $('.site-navbar').toggleClass('menu-on');
    e.preventDefault();
  });

  // Close menu on toggler click
  $('.nav-close').on('click', function (e) {
    $('.site-navbar').removeClass('menu-on');
    e.preventDefault();
  });


  // Offcanvas Info menu
  $('.offcanvas-icon').on('click', function (e) {
    $('.offcanvas-info').toggleClass('offcanvas-on');
    e.preventDefault();
  });

  // Close menu on toggler click
  $('.info-close').on('click', function (e) {
    $('.offcanvas-info').removeClass('offcanvas-on');
    e.preventDefault();
  });

  //Search Box addClass removeClass
  $('.header_search_btn').on('click', function () {
    $('.page_search_box').addClass('active')
  });
  $('.search_close > i').on('click', function () {
    $('.page_search_box').removeClass('active')
  });


  /* ---------------------------------------------
      Sticky Fixed Menu
  --------------------------------------------- */

  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;

    if (window_top > 50) {
      $('.fixed-btm-top').addClass('reveal');
    } else {
      $('.fixed-btm-top').removeClass('reveal');
    }
  });


  /* ---------------------------------------------
     Bottom To Top hide
  --------------------------------------------- */

  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;

    if (window_top > 50) {
      $('.fixed-btm-top').addClass('reveal');
    } else {
      $('.fixed-btm-top').removeClass('reveal');
    }
  });

  //  Sticky Menu

  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 50) {
      $('.navbar-sticky').addClass('menu_fixed animated fadeInDown');
    } else {
      $('.navbar-sticky').removeClass('menu_fixed animated fadeInDown');
    }
  });


  $(".hero-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    touchDrag: false,
    mouseDrag: false,
    autoplay: true,
    responsiveClass: true,
    autoplayHoverPause: false,
    margin: 0,
    padding: 0,
    items: 1,
    smartSpeed: 600,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });


  //  Lightbox what is this used of this section 
  // $('.popup').magnificPopup({
  //   type: 'image',
  //   gallery: {
  //     enabled: true
  //   },
  //   removalDelay: 300,
  // });

  /*$('#chike-my-courses-top-menu-btn').mouseenter(function(){
      $('.chike-my-courses-top-menu').show();
  });
  $('#chike-user-profile-menu-btn').mouseenter(function(){
      $('.chike-my-profile-top-menu').show();
  });
  $('.chike-top-menu-notifications-btn').mouseenter(function(){
      $('.chike-top-menu-notifications').show();
  });
  $('#chike-my-courses-top-menu-btn').mouseleave(function(){
      $('.chike-my-courses-top-menu').hide();
  });
  $('#chike-user-profile-menu-btn').mouseleave(function(){
      $('.chike-my-profile-top-menu').hide();
  });
  $('.chike-top-menu-notifications-btn').mouseleave(function(){
      $('.chike-top-menu-notifications').hide();
  });*/

}(jQuery));


// function addToCart(course_id, user_id) {
//   if (user_id != 0) {
//     $.ajax({
//       type: "get",
//       url: '/add-to-cart/' + course_id,
//       success: function (data) {
//         if (data == 1) {
//           createAlert('', 'Nice Work!', "course added in cart successfully", 'success', true, true, 'pageMessages');
//         } else {
//           createAlert('', '', "course is alerady added in cart", 'info', false, true, 'pageMessages');
//         }
//       },
//       error: function (XMLHttpRequest, textStatus, errorThrown) {
//         console.log(XMLHttpRequest);
//         createAlert('Opps!', 'Something went wrong', 'Please try again', 'danger', true, false, 'pageMessages');
//       }
//     });
//   } else {
//     var allcourse = JSON.parse(localStorage.getItem("allcourse")) || [];
//     allcourse.push(course_id);
//     localStorage.setItem("allcourse", JSON.stringify(allcourse));
//     createAlert('', 'Nice Work!', "course added in cart successfully", 'success', true, true, 'pageMessages');

//     var element = document.getElementById("cart_count");
//     $("#cart_count").addClass("bg-success");
//     element.innerHTML = [... new Set(allcourse)].length || "";

//   }

// }

function addToCart(course_id, count) {
  $.ajax({
    type: "get",
    url: '/add-to-cart/' + course_id,
    success: function (data) {
      if (data == 1) {
        var element = document.getElementById("cart_count");
        element.classList.add("bg-success")
        element.innerHTML = (parseInt(count) + 1);
        showMessageBox('Nice! added in cart successfully :)', 1)
      } else {
        showMessageBox('Course is alerady added in cart :)', 2)
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
      showMessageBox('Opps! Something went wrong Please refresh broser and tyr again ^', 3)
    }
  });
}

function addToWishlist(course_id) {
  $.ajax({
    type: "get",
    url: '/add-to-wishlist/' + course_id,
    success: function (data) {
      if (data == 1) {
        var element = document.getElementById("wishlist-i");
        var element1 = document.getElementById("wishlist-nav-i");
        element.classList.remove("chike-course-not-like");
        element.classList.add("fa-heart-red");
        element1.classList.add("fa-heart-blue");
        showMessageBox('Nice! Course added in Wishlist :)', 1)
      } else {
        showMessageBox('Course is alerady added in Wishlist :)', 2)
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
      showMessageBox('Opps! Something went wrong Please refresh broser and tyr again ^', 3)
    }
  });
}