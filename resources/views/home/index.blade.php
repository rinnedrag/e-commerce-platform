<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smiths</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/images/home/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="/css/home/main_page/bootstrap.min.css">
    <link rel="stylesheet" href="/css/home/main_page/owl.carousel.min.css">
    {{--<link rel="stylesheet" href="/css/home/main_page/flaticon2.css">--}}
    <link rel="stylesheet" href="/css/home/main_page/slicknav.css">
    <link rel="stylesheet" href="/css/home/main_page/animate.min.css">
    <link rel="stylesheet" href="/css/home/main_page/magnific-popup.css">
    <link rel="stylesheet" href="/css/home/main_page/fontawesome-all.min.css">
    {{--<link rel="stylesheet" href="/css/home/main_page/themify-icons.css">
    {{--<link rel="stylesheet" href="/css/home/main_page/slick.css">--}}
   {{-- <link rel="stylesheet" href="/css/home/main_page/nice-select.css">--}}
    <link rel="stylesheet" href="/css/home/main_page/style.css">

    @section('additionalCSS')
    @show
</head>

<body>

@include('home.layouts.preloader')

@include('home.layouts.header')

@section('content')
@show

<section class="subscribe_part" style="padding: 50px 0px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.layouts.footer')

<!-- JS here -->

<!-- All JS Custom Plugins Link Here  -->
<script src="/js/home/main_page/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="/js/home/main_page/jquery-3.2.1.min.js"></script>
<script src="/js/home/main_page/popper.min.js"></script>
<script src="/js/home/main_page/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="/js/home/main_page/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="/js/home/main_page/owl.carousel.min.js"></script>
<script src="/js/home/main_page/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="/js/home/main_page/wow.min.js"></script>
<script src="/js/home/main_page/animated.headline.js"></script>
<script src="/js/home/main_page/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="/js/home/main_page/jquery.scrollUp.min.js"></script>
{{--<script src="/js/home/main_page/jquery.nice-select.min.js"></script>--}}
{{--<script src="/js/home/main_page/jquery.sticky.js"></script>--}}

<!-- contact js -->
<script src="/js/home/main_page/contact.js"></script>
<script src="/js/home/main_page/jquery.form.js"></script>
<script src="/js/home/main_page/jquery.validate.min.js"></script>
<script src="/js/home/main_page/mail-script.js"></script>
<script src="/js/home/main_page/jquery.ajaxchimp.min.js"></script>

<!-- bootbox code -->
<script src="/js/vendor/bootbox.min.js"></script>
<script src="/js/vendor/bootbox.locales.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="/js/home/main_page/plugins.js"></script>
<script src="/js/home/main_page/main.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        @if(session('cart'))
        $('#itemsCount').replaceWith('<span id="itemsCount">{{count(session('cart'))}}</span>');
        @endif
    });
</script>

@section('additionalJS')
@show
</body>
</html>
