<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link media="screen" rel="stylesheet" type="text/css" href="{{ mix("/css/app.css") }}" >
    <link media="screen" rel="stylesheet" type="text/css" href="{{ mix("/css/vendor/multi-select.css") }}" >
    <link media="screen" rel="stylesheet" type="text/css" href="/css/vendor/bootstrap-multiselect.css" >
    <link rel="stylesheet" href="/css/home/main_page/magnific-popup.css">
    <!-- Our Custom CSS -->

    @section('additional')
    @show
    <link rel="stylesheet" href="/css/admin/admin-home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

@include('home.layouts.preloader')

<div class="wrapper">
    <!-- Sidebar  -->
@include('admin.layouts.sidebar')

<!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                @section('button')
                @show

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        @section('content')
            @show
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/js/home/main_page/jquery-3.2.1.min.js"></script>
<script src="/js/home/main_page/popper.min.js"></script>
<script src="/js/home/main_page/bootstrap.min.js"></script>

<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ mix('/js/vendor/jquery.multi-select.js') }}" type="text/javascript"></script>
<script src="/js/vendor/bootstrap-multiselect.js" type="text/javascript"></script>
<!-- bootbox code -->
<script src="/js/vendor/bootbox.min.js"></script>
<script src="/js/vendor/bootbox.locales.min.js"></script>
<script src="/js/home/main_page/jquery.magnific-popup.js"></script>

<script src="/js/admin/admin-home.js"></script>
@section('additionalJS')
@show
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>

</html>
