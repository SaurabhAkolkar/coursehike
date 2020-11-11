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


}); 

// Popover Js for Dashboard Page: Start
$('[data-toggle="popover"]').popover();
// Popover Js for Dashboard Page: End

 


// Video Course JS
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('.la-vcourse__lesson').on('click', function() {

  var video_id = $(this).attr('data-video-id');

  $.ajax({
    type: 'POST',
    url: "/learn/course/" + video_id,
    data:{video_id:video_id},
    success: function(response){
      let data = response.data;

      $('.la-vlesson__title').text(data.title);
      
      var options = {
        plugins: {
            qualityMenu: {
                useResolutionLabels: true
            }
        }
    };
      var lilaPlayer = videojs('lila-video');
      // lilaPlayer.hlsQualitySelector({
      //     displayCurrentQuality: true,
      // });
      // lilaPlayer.src({type: 'application/x-mpegURL', src: data.url});
      lilaPlayer.src([
        {
           src: data.url,
           type: 'application/x-mpegURL',
           label: 'Auto',
           selected: true,
        },
        {
           src: data.url+'?clientBandwidthHint=5',
           type: 'application/x-mpegURL',
           label: '1080P',
        },
        {
          src: data.url+'?clientBandwidthHint=35',
          type: 'application/x-mpegURL',
          label: '720P',
       },
        {
           src: data.url+'?clientBandwidthHint=1.8',
           type: 'application/x-mpegURL',
           label: '480P',
        },
        {
           src: data.url+'?clientBandwidthHint=0.77',
           type: 'application/x-mpegURL',
           label: '360P',
        },
        {
           src: data.url+'?clientBandwidthHint=0.38',
           type: 'application/x-mpegURL',
           label: '240p',
        },
     ]);
     if(lilaPlayer.controlBar.getChild('QualitySelector') == undefined)
        lilaPlayer.controlBar.addChild('QualitySelector');

    lilaPlayer.play();
    
      // console.log(data.url)

      // window.URL = window.URL || window.webkitURL; //Used to judge that the computer system window.webkitURL and window.URL are the same, window.URL standard definition, window.webkitURL is the realization of the webkit kernel, generally used on mobile phones, and the implementation of browsers such as Firefox.
      // var xhr = new XMLHttpRequest();  // Implement data request and communicate with http protocol
      // xhr.open("GET", data.url, true);  //Open an address, request type address Asynchronous or synchronous 
      // xhr.responseType = "blob";  // Set the return value to blob object
      // xhr.onload = function (e) { //The function to be executed after the request
      //     if (this.status == 200) { //Successful 
      //         var blob = this.response;  // The parameter successfully requested is assigned to "blob"
      //         console.log(blob);
      //         var src_url = window.URL.createObjectURL(blob); //Create an object The video only needs to be obtained once, and after obtaining it once, the object needs to be released.
              
      //         var lilaPlayer = videojs('lila-video');
      //         lilaPlayer.src({type: 'application/x-mpegURL', src: src_url});

      //         lilaPlayer.onload = function () {//The function to execute after getting the video?
      //             window.URL.revokeObjectURL(lilaPlayer.src); //release this object
      //         };
      //     }
      // }
      // xhr.send(); //send request
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("You need to Login/Subscribe");
    }  
  });

});