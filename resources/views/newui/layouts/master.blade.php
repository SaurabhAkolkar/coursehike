<!DOCTYPE html>
@php
    //code to set the system language
    $language = Session::get('changed_language');
    //make a list of rtl languages
    $rtl = ['ar', 'he', 'ur', 'arc', 'az', 'dv', 'ku'];
    $global_settings = App\Setting::first();
@endphp

<html class="no-js" lang="en" @if (in_array($language, $rtl)) dir="rtl" @endif>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('seo_content')
    <meta name="description" content="{{ $global_settings->meta_data_desc }}">
    <meta name="keywords" content="{{ $global_settings->meta_data_keyword }}">
    <!-- favicon-icon -->
    <link rel="icon" type="image/icon" href="{{ asset('images/favicon/favicon.svg') }}">

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/bootstrap/bootstrap.css") }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/awesome/css/fontawesome-all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/magnific-popup/magnific-popup.css") }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset("assets/css/woocomerce.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/coursehike.css") }}">
    @yield('stylesheets')

</head>

<body id="top-header">
    @include('newui.layouts.navbar')
    <!-- Main content -->
    @yield('body')
    <!-- Main content end-->


    <!-- Main jQuery -->
    <script src="{{ asset("assets/vendors/jquery/jquery.js") }}"></script>
    <!-- Bootstrap 5:0 -->
    <script src="{{ asset("assets/vendors/bootstrap/popper.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/bootstrap/bootstrap.js") }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset("assets/vendors/magnific-popup/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("assets/js/script.js") }}"></script>
    <script type="text/javascript">
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });
        /* 2. Action to perform on click */
        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            } else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            $('#rating_value').val(ratingValue)
            responseMessage(msg);

        });

        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }

        $(".chike-description-show_hide").on("click", function() {
            var show_hide = $(this).text();
            if (show_hide == 'Read More...') {
                $(this).text('Read Less...');
            } else {
                $(this).text('Read More...');
            }
            $('.chike-description-more-content').slideToggle(200);
        });

       
    </script>

    @yield('scripts')
    @include('newui.layouts.footer')

</body>

</html>
