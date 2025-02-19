<script src="{{ url('js/jquery-2.min.js') }}"></script> <!-- jquery library js -->
<script src="{{ url('js/colorbox.js') }}"></script> <!-- colorbox js -->
<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script> <!-- bootstrap js -->
<script src="{{ url('vendor/counter/waypoints.min.js') }}"></script> <!-- facts count js required for jquery.counterup.js file -->
<script src="{{ url('vendor/counter/jquery.counterup.js') }}"></script> <!-- facts count js-->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
?>
@if (in_array($language,$rtl))
<script src="{{ url('vendor/owl/js/owl.carouselrtl.min.js') }}"></script> <!-- owl carousel js -->	
@else
<script src="{{ url('vendor/owl/js/owl.carousel.min.js') }}"></script> <!-- owl carousel js -->	
@endif
<script src="{{ url('vendor/smoothscroll/smooth-scroll.js') }}"></script> <!-- smooth scroll js -->
<script src="{{ url('vendor/popup/jquery.magnific-popup.min.js')}}"></script> <!-- popup js-->
<script src="{{ url('vendor/navigation/menumaker.js') }}"></script> <!-- navigation js--> 
<script src="{{ url('vendor/mailchimp/jquery.ajaxchimp.js') }}"></script> <!-- mail chimp js --> 
<script src="{{ url('vendor/protip/protip.js') }}"></script> <!-- protip js -->
<script src="{{ url('js/theme.js') }}"></script> <!-- custom js -->
<script src="{{ url('js/FWDUVPlayer.js') }}"></script> <!-- player js --> 
<script src="{{ url('js/jquery.owl-filter.js') }}"></script> <!-- filter js --> 
<script src="{{ url('js/fontawesome-iconpicker.js')}}"></script><!-- iconpicker js -->
<script src="{{ url('js/tinymce.min.js')}}"></script>
<script src="{{ url('js/protip.js') }}"></script> <!-- protip js -->
<script src="{{ url('js/select2.min.js') }}"></script> <!-- select2 -->
<script src="{{ URL::asset('js/pace.min.js') }}"></script>
<script src="{{ url('js/custom-js.js')}}"></script>

<script src="{{ asset('js/share.js') }}"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ url('js/sweetalert2@9.js')}}"></script>


{{-- Saurabh  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gsetting->google_ana }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $gsetting->google_ana }}');
</script> --}}

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5CW2KJ5');</script>
<!-- End Google Tag Manager -->

{{-- Saurabh @if($gsetting->rightclick=='1')
	<script>
		(function($) {
  		"use strict";
		    $(function() {
			    $(document).on("contextmenu",function(e) {
			       return false;
			    });
			});
	    })(jQuery);
	</script>
@endif
@if($gsetting->inspect=='1')
    <script>
      	(function($) {
  		"use strict";
	         document.onkeydown = function(e) {
	        if(event.keyCode == 123) {
	           return false;
	        }
	        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
	           return false;
	        }
	        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
	           return false;
	        }
	        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
	           return false;
	        }
	        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
	           return false;
	        }
	      }
      })(jQuery);
    </script>
@endif --}}

<script>

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('{{ url('sw.js') }}')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}
</script>


<script>
    $('.prime-cat').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });

    $('.sub-cate').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });

    $('.child-cate').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });
</script>




@yield('custom-script')