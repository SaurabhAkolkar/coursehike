$(function(){
  // Global Dropdown Toggle: Start
  $('.dropdown-toggle').dropdown()
  // Global Dropdown Toggle: End

  // Global Alert Animation for Learners
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
  }, 3000);

  


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
      start: "top 15%",
      end: "+=1130px",
    }, opacity: 0.2
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
    }, boxShadow:"rgba(202, 202, 202, 0.10) 0px 0px 10px 10px"
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
        $('#wishlist_alert_div').html(' ');
        let successAlert = `<div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                              <h6 id="wishlist_alert_message" class="la-btn__alert-msg">${data}</h6>
                              <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true" class="text-white">&times;</span>
                              </button>
                            </div>`
        $('#wishlist_alert_div').html(successAlert);        
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
        $('#wishlist_alert_div').html(' ');
        $('#course_'+id).remove(); 
        let successAlert = `<div class="la-btn__alert-success col-md-4 offset-md-8 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                              <h6 id="wishlist_alert_message" class="la-btn__alert-msg">${data}</h6>
                              <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true" class="text-white">&times;</span>
                              </button>
                            </div>`
        $('#wishlist_alert_div').html(successAlert);
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
