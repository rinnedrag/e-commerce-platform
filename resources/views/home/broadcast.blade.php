@extends('home.index')

@section('additionalCSS')
    <meta name="user_id" content="{{Auth::id()}}">
    {{--<link rel="stylesheet" href="/css/home/main_page/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/css/vendor/ekko-lightbox.css">

    <link rel="stylesheet" href="/css/vendor/demo-console/index.css">
    <!-- custom css -->
    <link rel="stylesheet" href="/css/broadcast.css">

    {{--<script src="/js/home/main_page/vendor/jquery-1.12.4.min.js"></script>--}}
    {{--<script src="/js/home/main_page/bootstrap.min.js"></script>--}}
    <script src="/js/vendor/ekko-lightbox.js"></script>

    <script src="/js/vendor/draggabilly.pkgd.min.js"></script>
    <script src="/js/vendor/adapter.js"></script>
    <script src="/js/vendor/demo-console/index.js"></script>

    <script src="/js/vendor/kurento-utils.js"></script>
    <!-- custom js -->
    <script src="/js/broadcast.js"></script>
@endsection

@section('content')
<section style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px">
                <h1>Видеочат с консультантом</h1>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-start">
                    <div class="col-lg-4" style="margin-bottom: 10px">
                        <button type="button" id="register" class="btn btn-primary" style="width: 70%">
                            <i class="fas fa-plus"></i>
                            <span>Присоединиться</span>
                        </button>
                    </div>
                    <div class="col-lg-4" style="margin-bottom: 10px">
                        <button type="button" id="call" class="btn btn-success" style="width: 70%">
                            <i class="fas fa-video"></i>
                            <span>Вызвать консультанта</span>
                        </button>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" id="terminate" class="btn btn-danger" style="width: 70%">
                            <i class="fas fa-stop"></i>
                            <span>Остановить сессию</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row" style="padding-top: 20px">
                    <div class="col-lg-12" id="videoBig" style="margin: 10px">
                        <video id="videoOutput" autoplay width="100%" height="100%"
                               poster="/images/home/img/camera.png"></video>
                    </div>
                    <div class="col-lg-12" id="videoSmall" style="margin: 10px">
                        <video id="videoInput" autoplay width="100%" height="100%"
                               poster="/images/home/img/camera.png"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
