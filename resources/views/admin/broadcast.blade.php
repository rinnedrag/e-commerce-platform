@extends('admin.index')
@section('additional')
    {{--<link rel="stylesheet" href="/css/home/main_page/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/css/vendor/ekko-lightbox.css">

    <link rel="stylesheet" href="/css/vendor/demo-console/index.css">
    <!-- custom css -->
    <link rel="stylesheet" href="/css/broadcast.css">
    <meta name="user_id" content="{{Auth::id()}}">

    <script src="/js/home/main_page/vendor/jquery-1.12.4.min.js"></script>
    {{--<script src="/js/home/main_page/bootstrap.min.js"></script>--}}
    <script src="/js/vendor/ekko-lightbox.js"></script>

    <script src="/js/vendor/draggabilly.pkgd.min.js"></script>
    <script src="/js/vendor/adapter.js"></script>
    <script src="/js/vendor/demo-console/index.js"></script>

    <script src="/js/vendor/kurento-utils.js"></script>
    <!-- custom js -->
    <script src="/js/admin/admin-broadcast.js"></script>
@endsection

@section('button')
    <button type="button" id="register" class="btn btn-primary"
            style="margin-left: 20px">
        <i class="fas fa-plus"></i>
        <span>Присоединиться</span>
    </button>
    <button type="button" id="terminate" class="btn btn-danger"
            style="margin-left: 20px">
        <i class="fas fa-stop"></i>
        <span>Остановить сессию</span>
    </button>
@endsection

@section('content')

        <div class="container-fluid">
            <div class="row">
                    {{--<br /> <label class="control-label" for="console">Console</label><br>
                    <br>
                    <div id="console" class="democonsole">
                        <ul></ul>
                    </div>--}}
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-6" id="videoBig">
                    <video id="videoOutput" autoplay width="640px" height="480px"
                           poster="/images/home/img/camera.png"></video>
                </div>
                <div class="col-md-6" id="videoSmall">
                    <video id="videoInput" autoplay width="640px" height="480px"
                           poster="/images/home/img/camera.png"></video>
                </div>
            </div>
        </div>
@endsection
