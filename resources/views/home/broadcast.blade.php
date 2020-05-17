@extends('home.index')

@section('additionalCSS')
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
    <div class="container ">
        <div style="margin-bottom: 20px">
            <h1>Видеочат с консультантом</h1>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="control-label" for="name">Name</label>
                <div class="row">
                    <div class="col-md-6">
                        <input id="name" name="name" class="form-control" type="text"
                               onkeydown="if (event.keyCode === 13) register();" />
                    </div>
                    <div class="col-md-6 text-right">
                        <a id="register" href="#" class="btn btn-primary"><span
                                class="glyphicon glyphicon-plus"></span> Register</a>
                    </div>
                </div>

                <br /> <br /> <label class="control-label" for="peer">Peer</label>
                <div class="row">
                    <div class="col-md-6">
                        <input id="peer" name="peer" class="form-control" type="text"
                               onkeydown="if (event.keyCode === 13) call();">
                    </div>
                    <div class="col-md-6 text-right">
                        <a id="call" href="#" class="btn btn-success"><span
                                class="glyphicon glyphicon-play"></span> Call</a> <a id="terminate"
                                                                                     href="#" class="btn btn-danger"><span
                                class="glyphicon glyphicon-stop"></span> Stop</a>
                    </div>
                </div>
                <br /> <label class="control-label" for="console">Console</label><br>
                <br>
                <div id="console" class="democonsole">
                    <ul></ul>
                </div>
            </div>
            <div class="col-md-7">
                <div id="videoBig">
                    <video id="videoOutput" autoplay width="640px" height="480px"
                           poster="img/webrtc.png"></video>
                </div>
                <div id="videoSmall">
                    <video id="videoInput" autoplay width="240px" height="180px"
                           poster="img/webrtc.png"></video>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
