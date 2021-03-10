$(function(){
  // Global Dropdown Toggle: Start
  $('.dropdown-toggle').dropdown()
  // Global Dropdown Toggle: End

  
  // Nested Links in Course Cards
  $('#la-course__nested-links li').on('click', function(e) {
    var value = $(this).children('a').attr('value');
    e.preventDefault();
    console.log(value)
  });


  //- On click on Entire Course Card
  $("#course_card_link").on('click', function() {
    window.location = $(this).find("a").attr("href"); 
    return false;
  });

  // Home Video On scroll Pause/Play: Start
  $(window).on("scroll",function(){
    if($(window).scrollTop()>500){      
       $('#home_video').trigger('pause');
     }
     else
     {
       $('#home_video').trigger('play');
     }
  });
  // Home Video On scroll Pause/Play: End

  // Global Alert Animation for Learners: Start
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(2500, function() {
        $(this).remove();
    });
  }, 5000);
  // Global Alert Animation for Learners: End


  //- Carousel Indiactors for Nav Tabs
  /*(function($) {
    $(".la-courses__nav-tabs").on('scroll', function() {
      $val = $(this).scrollLeft();
  
      if($(this).scrollLeft() + $(this).innerWidth()>=$(this)[0].scrollWidth){
          $(".la-courses__nav-next").show();
      }
    });

    console.log( 'init-scroll: ' + $(".la-courses__nav-next").scrollLeft() );
    $(".la-courses__nav-next").on("click", function(){
      $(".la-courses__nav-tabs").animate( { scrollLeft: '+=250' }, 200);
    });

    $(".la-courses__nav-prev").on("click", function(){
      $(".la-courses__nav-tabs").animate( { scrollLeft: '-=250' }, 200);
    });

  })(jQuery);
  */
  //- Carousel Indiactors for Nav Tabs

  //- Filter Sidebar
  $("#filteredCourses").on('click', function(event){
    event.stopPropagation();
    $('#filtered_sidebar').show(); 
    $('#filtered_sidebar').addClass('active'); 
    $("body").css('overflow','hidden');
  });

  $("#filter_close").on('click', function(event){
    event.stopPropagation();
    $('#filtered_sidebar').hide();
    $("body").css('overflow','auto');
  });


  //Swiper Js for Login & Register page
  if($('.entry-swiper-container')[0]){
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
  }
  
  // Swiper JS for Browse Courses in Homepage
  // var course_Sliders = [];
   
  // if($(this)[0]){
  if($('.la-home__course-container')[0]){     
    var course_swiper = new Swiper(".la-home__course-container", {
      slidesPerView: 'auto',
      //loop: true,
      spaceBetween: 25,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".la-home__course-paginations",
        clickable: true,
      },
      // navigation: {
      //   nextEl: '.la-home__course-next',
      //   prevEl: '.la-home__course-prev',
      // },
      breakpoints: {  
        // when window width is <= 480px     
        320: {       
          slidesPerView: 'auto',  
          spaceBetween: 15,
        },       
        // 767: {       
        //   slidesPerView: 'auto',         
        // },
        991: {
          slidersPerView: 3,
        }, 
      }
    });
  }

    /*var course_slider_pagination_first = course_swiper[0].pagination.el;
    var course_slider_pagination_first_width = $(course_slider_pagination_first).width() + 30;
    $(course_slider_pagination_first).css("width", course_slider_pagination_first_width);*/
    

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      var paneTarget = $(e.target).attr('href');
      var $thePane = $('.tab-pane' + paneTarget);
      var paneIndex = $thePane.index();
      if ($thePane.find('.la-home__course-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
        
        course_swiper[paneIndex].update();

        var course_slider_pagination = course_swiper[paneIndex].pagination.el;
        var course_slider_pagination_width = $(course_slider_pagination).width() + 30;
        $(course_slider_pagination).css("width", course_slider_pagination_width);
      }
    }); 
    
  // } 

  //- Autoplay Stop on Mouse Hover
    $(".swiper-container").hover(function() {
      this.swiper.autoplay.stop();
    }, function() {
        this.swiper.autoplay.start();
    });

    // Home Banner Browser Courses ONclick
    $('#home_courses_redirect').on("click", function(){
      $('.la-section--courses-inwrap').addClass('la-home__course-animate');
    });

  // Swiper JS for Master Classes in Homepage
  if($('.la-home__master-container')[0]){   
    var master_slider = new Swiper('.la-home__master-container', {
      slidesPerView: 'auto',
      spaceBetween: 25,
      //loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.la-home__master-pagination',
        clickable: true,
      },
      // navigation: {
      //   nextEl: '.la-home__master-next',
      //   prevEl: '.la-home__master-prev',
      // },
      breakpoints: {  
        // when window width is <= 480px     
        320: {       
          slidesPerView: 1,         
        },       
        576: {       
          slidesPerView: 2,         
        },
        767: {       
          slidesPerView: 3,         
        },
        1200: {
          slidersPerView: 4,
        },  
      }, 
    });
  }

    /*var master_slider_pagination_first = master_slider.pagination.el;
    var master_slider_pagination_first_width = $(master_slider_pagination_first).width() + 30;
    $(master_slider_pagination_first).css("width", master_slider_pagination_first_width); */

  //- Customize Section in Home Page
  if($('.la-home__customize-container')[0]){   
    var swiper = new Swiper('.la-home__customize-container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      loop:true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.la-home__customize-pagination',
        clickable: true,
      },
    });
  }
  

  //Swiper Js for Artist gallery
  if($('.gallery-thumbs')[0]){
      var galleryThumbs = new Swiper('.gallery-thumbs', {
        // spaceBetween: 10,
        slidesPerView: 13,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {  
          320: {       
            slidesPerView: 3,         
          },       
          767: {       
            slidesPerView: 10,         
          },
          1200: {
            slidersPerView: 13,
          },  
        }, 
      });
      var galleryTop = new Swiper('.gallery-top', {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        virtualTranslate: true,
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: galleryThumbs
        }
      });
  }

  //- Swiper JS for Observe Section
  if($('.la-trail__title-container')[0]){
    var swiper = new Swiper('.la-trail__title-container', {
      direction: 'vertical',
      slidersPerView: 1,
      loop:true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
    });
  }

  //Swiper Js for Become Creator
  if($('.la-mcard__container')[0]){
    var swiper = new Swiper('.la-mcard__container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  }
  
  //Swiper Js for Learning Plans
  if($('.la-choose__slider')[0]){
      var swiper = new Swiper('.la-choose__slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      breakpoints: {  
          // when window width is <= 480px     
          480: {       
            slidesPerView: 1,       
            spaceBetween: 20     
          },       
          767: {       
            slidesPerView: 2,       
            spaceBetween: 30     
          } 
      } 
    });
  }

  //Swiper Js for Reviews in Course Page
  if($('.la-lcreviews__container')[0]){
    var swiper = new Swiper('.la-lcreviews__container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.la-lcreviews__pagination',
        clickable: true,
      }
    });
  }


  // Rating 
  $("#rateYo").rateYo({
    rating: 3.5,
    readOnly: true,
    starWidth: "18px",
    normalFill: "#D5D5D5",
    ratedFill: "#FFC516"
  });


  // Vcourse Full view button
  $('#vcourseFullView').on('click', function() {
    $('#vcourse_row').toggleClass('full-view');

    if($('#vcourse_row').hasClass('full-view')) {
      $('#vcourseFullView .la-btn__text').text('Collapse the list');
    } else {
      $('#vcourseFullView .la-btn__text').text('See the list');
    }
  });

  //Sidemenu
  $('#sidebar_menu_btn').on('click', function() {
    $('.la-profile__sidebar').toggleClass('menu-open')
  })

  // Navbar Search
  $('#header_search').on('click', function(){
    $('#header_search_input').toggleClass('la-header__gsearch-expand');
    
    if($('#header_search_input').hasClass('la-header__gsearch-expand')){
      $('#header_search_input').focus();
      $('#header_search_input').on('blur', function(){
        $('#header_search_input').focus();
      });
    }else{
      $('#header_search_input').blur();
    }  
  });

  $('.la-header__gsearch-icon').on('click', function(){
    $(this).toggleClass('la-header__gsearch-isActive');
  });
  

  //header sidemenu
  $('.la-header__sidemenu-btn').on('click', function() {
    $('.la-header__nav').toggleClass('menu-open');
    $('.la-header__sidemenu-btn').toggleClass('menu-open');
  })



  ////// Scroll animation ////////


  gsap.utils.toArray('.la-anim__wrap').forEach(function(elem) {

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: elem,
        start: 'top bottom'
      }
    });

    var item_stagger = elem.querySelectorAll(".la-anim__stagger-item");
    var item_stagger_x = elem.querySelectorAll(".la-anim__stagger-item--x");
    var item_textMove = elem.querySelectorAll(".la-anim__text-move");
    var item_textMoveImg = elem.querySelector(".la-anim__text-move + img");
    var item_fadeIn = elem.querySelectorAll(".la-anim__fade-in");
    var item_fadeInLeft = elem.querySelectorAll(".la-anim__fade-in-left");
    var item_fadeInRight = elem.querySelectorAll(".la-anim__fade-in-right");
    var item_fadeInTop = elem.querySelectorAll(".la-anim__fade-in-top");
    var item_fadeInBottom = elem.querySelectorAll(".la-anim__fade-in-bottom");

    // Global
    tl.to(item_stagger, {opacity: 1, y:0, stagger: 0.2})
    tl.to(item_textMove, {opacity: 1, y: 0}, "-=0.6")
    tl.to(item_fadeIn, {duration: 0.4, opacity: 1, ease: "Expo.ease"})
    tl.to(item_stagger_x, {opacity: 1, x:0, stagger: 0.1}, "0")

    tl.to(item_fadeInTop, {duration: 0.4, opacity: 1, y: 0, ease: "Expo.ease"}, "0")
    tl.to(item_fadeInBottom, {duration: 0.4, opacity: 1, y: 0, ease: "Expo.ease"}, "0")
    tl.to(item_fadeInLeft, {duration: 0.4, opacity: 1, x: 0, ease: "Expo.ease"}, "0")
    tl.to(item_fadeInRight, {duration: 0.4, opacity: 1, x: 0, ease: "Expo.ease"}, "0")

  });


  gsap.utils.toArray('.la-anim__wrap').forEach(function(elem) {

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: elem,
        scrub: true
      }
    });

    var item_circle = elem.querySelector(".la-section__circle");
    var item_TextMove = elem.querySelectorAll(".la-anim__text-move");

    tl.to(item_circle, {
      scrollTrigger: {
        start: 'top bottom'
      }, duration: 0.4, opacity: 1, scale: 1}, "0")

    tl.to(item_TextMove, {
      scrollTrigger: {
        start: "top bottom"
      }, x: 100, ease: "Expo.ease"}, "0");

  });

  gsap.registerPlugin(ScrollTrigger);

  gsap.to(".la-anim__pin", {
    scrollTrigger: {
      trigger: ".la-anim__pin",
      scrub: true,
      pin: true,
      pinSpacing: false,
      start: "top 0%",
      end: "+=600px",
    }, opacity: 1
  });

  //- Subscription Card on Homepage
  gsap.to(".la-anim__pin2", {
    scrollTrigger: {
      trigger: ".la-anim__pin2",
      scrub: true,
      pin: true,
      pinSpacing: false,
      start: "top 45%",
      end: "+=600",
    }, opacity: 1
  });
  
  //- Testimonials Section in Learning Plans
  gsap.to(".la-anim__pin3", {
    scrollTrigger: {
      trigger: ".la-anim__pin3",
      scrub: true,
      pin: true,
      pinSpacing: false,
      start: "top 20%",
      end: "+=900",
    }, opacity: 1
  });

  // For Home Page
  gsap.utils.toArray('.la-anim__slide').forEach(function(elem) {
    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: elem,
        start: "top 40%",
        toggleActions: "restart none none reset"
      }
    });

    var item_priceSlide = elem.querySelectorAll(".la-anim__slide-box");

    tl.to(item_priceSlide, {opacity: 1, y: -40, duration: 0.4, ease: "Expo.ease"})

  });

  //For Header scroll to hide and show
  var actionNav = gsap.to('.la-header', {y:'-=80', duration:0.5, ease:'power2.in', paused:true});

  ScrollTrigger.create({
    trigger: ".la-header",
    start: "10px top",
    end: 99999,
    // onEnter: () => {},
    onUpdate: ({progress, direction, isActive}) => {
      if (direction == -1) {
        actionNav.reverse()
      } if (direction == 1 ) {
        actionNav.play()
      } else if (direction == 1 && isActive == true) {
        actionNav.play()
      }
    }
  });

  gsap.to('.la-header', {
    scrollTrigger: {
      trigger: ".la-header",
      start: "80px top",
      toggleActions: "restart none reset none"
    }, 
    // boxShadow:"rgba(0, 0, 0, 0.14) 0px 0px 10px 6px"
  })

  
}); 

// Popover Js for Dashboard Page: Start
$('[data-toggle="popover"]').popover();
// Popover Js for Dashboard Page: End

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

// Add to Playlist JS

function showAddToPlaylist(id){
  $('#course_id').val(id);
  $('#add_to_playlist_modal').modal('show');
}
function submitAddToPlaylist(id){
  $('#playlist_id').val(id);
  $('#add_to_playlist_form').submit();
}
function addPlaylist(){
let playlistName = $('#playlist_name').val();
if(playlist_name == ""){
    $('#playlist_name_error').html('Please enter the Playlist Name');
    return false;
}
let up = $('#user_playlists');
$.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url: "/create-playlist",
      data: {playlist_name: playlistName, ajax_request: true},
      success:function(data){   
 
        if(data == 0){
          $('#playlist_name_error').html('Playlist already exist.');
        }else{
          $('#playlist_name').val('');
          $('#playlist_name_error').html('Playlist Added.');          
          up.append('<a class="la-playlist__modal-item list-group-item" href="#" role="button" onclick="submitAddToPlaylist('+data['id']+')">'+data['name']+'</option>');
        }
        
 
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
 
} 
 
function searchPlaylist() {
    var input = document.getElementById("search_playlist");
    var filter = input.value.toLowerCase();
    var nodes = document.getElementsByClassName('targets_playlists');
  
    for (i = 0; i < nodes.length; i++) {
      if (nodes[i].innerText.toLowerCase().includes(filter)) {
        nodes[i].style.display = "block";
      } else {
        nodes[i].style.display = "none";
      }
    }
}

//- Add to Wishlist
function addToWishList(id){

  let course_id = id;
  if(course_id){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"post",
      url: '/add-to-wishlist',
      data: {course_id: course_id},
      success:function(data){   
        $('#alert_div').html(' ');
        let successAlert = `<div class="la-btn__alert position-relative">
                              <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                <span id="wishlist_alert_message" class="la-btn__alert-msg">${data}</span>
                                <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true" style="color:#56188C">&times;</span>
                                </button>
                              </div>
                            </div>`;
        $('#alert_div').html(successAlert);        
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function() {
              $(this).remove();
          });
        }, 3000);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }else{
    alert('Something went wrong');
  }
}

function removeFromWishList(id){

  let course_id = id;
  if(course_id){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"post",
      url: '/remove-from-wishlist',
      data: {course_id: course_id},
      success:function(data){   
        $('#alert_div').html(' ');
        $('#course_'+id).remove(); 
        let successAlert = `<div class="la-btn__alert position-relative">
                              <div class="la-btn__alert-success col-lg-4 offset-lg-4 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                <span id="wishlist_alert_message" class="la-btn__alert-msg">${data}</span>
                                <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true" style="color:#56188C">&times;</span>
                                </button>
                              </div>
                            </div>`;
        $('#alert_div').html(successAlert);
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function() {
              $(this).remove();
          });
        }, 3000);
               
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }else{
    alert('Something went wrong');
  }
}

//- Add to Cart
function addToCart(id='1', classes='all') {
  let course_id = id;
  if(classes != 'all'){
  }
  if(course_id){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"get",
      url: '/add-to-cart',
      data: {course_id: course_id, classes : classes},
      success:function(data){   
        $('#alert_div').html(' ');
     
        let successAlert = `<div class="la-btn__alert position-relative">
                              <div class="la-btn__alert-success col-lg-4 offset-lg-4 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                <span id="wishlist_alert_message" class="la-btn__alert-msg">${data}</span>
                                <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true" style="color:#56188C">&times;</span>
                                </button>
                              </div>
                            </div>`;
        $('#alert_div').html(successAlert);
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function() {
              $(this).remove();
          });
        }, 3000);
              
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }else{
    alert('Something went wrong');
  }
}



function addToCategory(id){
  var input = $('#filter_categories').val();

  if(input){
      arr = JSON.parse("[" + input + "]");
      if(arr.includes(id)){
          index = arr.indexOf(id);
          arr.splice(index, 1);
      }else{
        arr.push(id);
      }
    $('#filter_categories').val(arr);
  }else{
    input = [];
    input.push(id);
    $('#filter_categories').val(input);
  }
}

function addToSubCategory(id){
  var sub = $('#filter_sub_categories').val();

  if(sub){
      arr = JSON.parse("[" + sub + "]");
      if(arr.includes(id)){
          index = arr.indexOf(id);
          arr.splice(index, 1);
      }else{
        arr.push(id);
      }
    $('#filter_sub_categories').val(arr);
  }else{
    sub = [];
    sub.push(id);
    $('#filter_sub_categories').val(sub);
  }
}

function addToLanguage(id){
  var lan = $('#filter_languages').val();

  if(lan){
      arr = JSON.parse("[" + lan + "]");
      if(arr.includes(id)){
          index = arr.indexOf(id);
          arr.splice(index, 1);
      }else{
        arr.push(id);
      }
    $('#filter_languages').val(arr);
  }else{
    lan = [];
    lan.push(id);
    $('#filter_languages').val(lan);
  }
}

function addToLevel(id){
  var level = $('#filter_level').val();

  if(level){
      arr = JSON.parse("[" + level + "]");
      if(arr.includes(id)){
          index = arr.indexOf(id);
          arr.splice(index, 1);
      }else{
        arr.push(id);
      }
    $('#filter_level').val(arr);
  }else{
    level = [];
    level.push(id);
    $('#filter_level').val(level);
  }
}

$('input[type=radio][name=sort_by]').change(function() {
  window.location.href= '?sort_by='+this.value;

});

function clearNotification(){
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:"get",
    url: '/clear-all-notification',
    success:function(data){   
         
           $('#notificationBadge').html(0);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
    }
  });
}


// vcourse video lish dynamic height

var course_video_height = function() {
  var course_video = $('.la-vcourse__video-wrap').height();
  $('.la-vcourse__curriculam').css('height', course_video);
}

course_video_height();

$( window ).resize(function() {
  course_video_height();
});