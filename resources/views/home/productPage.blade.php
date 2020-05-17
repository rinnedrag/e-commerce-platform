@extends('home.index')

@section('additionalCSS')
    <link rel="stylesheet" href="/css/home/main_page/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/home/main_page/styleSingleProduct.css">
    <link rel="stylesheet" href="/css/home/main_page/font-awesome.min.css">
@endsection

@section('content')
    <!-- slider Area Start-->

    <!-- slider Area End-->
    <!-- product section -->
    <section class="product-section section-padding">
        <div class="container">
            <div class="row">
                <div id="images" class="col-lg-6">
                    <div class="product-pic-zoom">
                        <img class="product-big-img" src="/storage/images/footwear/{{$model['id']}}/{{$images[0]->filename}}" alt="">
                    </div>
                    <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                        <div class="product-thumbs-track">
                            @foreach($images as $image)
                                <div class="pt @if ($loop->first) active @endif " data-imgbigurl="/storage/images/footwear/{{$model['id']}}/{{$image->filename}}">
                                    <img src="/storage/images/footwear/{{$model['id']}}/thumb-{{$image->filename}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 product-details">
                    <h2 class="p-title"><b>{{$model['brand']}}</b> \ {{$model['kind']}}</h2>
                    <h3 class="p-price"> <span id="price">{{$model['price']}}</span> &#8381;</h3>
                    <h4 class="p-stock">Доступно моделей: <span id="modelsCount">на складе</span></h4>
                    <div class="p-rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o fa-fade"></i>
                    </div>
                    <div class="p-review">
                        <a href="">3 отзыва</a>|<a href="">Оставить отзыв</a>
                    </div>
                    <div class="fw-color-choose">
                        <p>Цвет</p>
                        @foreach($colors as $color)
                            <div class="cs-item">
                                <input type="radio" name="cs" value="{{$color['id']}}" id="radio-{{$color['color']}}"
                                       @if ($color['color'] == $model['color']) checked @endif >
                                <label title="{{$color['color']}}" style="background: {{$color['code']}};
                                @if ($color['code'] == "#ffffff") border:1px solid #868c98 @endif" for="radio-{{$color['color']}}">
                                </label>
                            </div>
                        @endforeach

                    </div>
                   <div id="sizes" class="fw-size-choose">
                        <p>Размер</p>
                        @foreach($sizes as $modelSize)
                            <div class="sc-item">
                                <input type="radio" name="sc" value="{{$modelSize->size}}" id="{{$modelSize->size}}"
                                       @if (!$modelSize->count) disabled @elseif ($loop->first) checked @endif >
                                <label for="{{$modelSize->size}}">{{$modelSize->size}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="quantity">
                        <p>Количество</p>
                        <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                    </div>
                    <button id="addToCart" class="site-btn">Добавить в корзину</button>
                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">Детали о товаре</button>
                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    <p>{{$model['description']}}</p>
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Пол</td>
                                                <td>{{$model['gender']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Сезон</td>
                                                <td>{{$model['season']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Полнота обуви</td>
                                                <td>{{$model['fitting']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Вид каблука</td>
                                                <td>{{$model['heel_kind']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Вид застёжки</td>
                                                <td>{{$model['clasp_kind']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Страна производителя</td>
                                                <td>{{$model['producer_country']}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                        aria-expanded="false" aria-controls="collapse2">Состав </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Компонент</th>
                                            <th scope="col">Материал</th>
                                            <th scope="col">Процент</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($materials as $material)
                                            <tr>
                                                <td>{{$material->component}}</td>
                                                <td>{{$material->material}}</td>
                                                <td>{{$material->percent*100}}%</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                        aria-expanded="false" aria-controls="collapse3">Детали оплаты </button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="/images/home/diviz/cards.png" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingFour">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4">Доставка</button>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="panel-body">
                                    <h4>7 Days Returns</h4>
                                    <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-sharing">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->
@endsection

@section('additionalJS')
    <script src="/js/home/main_page/jquery.nicescroll.min.js"></script>
    <script src="/js/home/main_page/jquery.zoom.min.js"></script>
    <script src="/js/home/main_page/jquery-ui.min.js"></script>
    <script src="/js/home/main_page/productPage.js"></script>
    <script src="/js/home/productPage.js"></script>
    <script>
        $(document).ready(function() {
            let $url = "http://127.0.0.1:8000";

            $('#addToCart').on('click', function (event) {
                event.preventDefault();
                let $model = $('input[name="cs"]:checked').val();
                let $size = $('input[name="sc"]:checked').val();
                let $quantity = $('input[name="quantity"]').val();

                let $data = JSON.stringify({
                    "size": $size,
                    "brand": "{{$model['brand']}}",
                    "kind": "{{$model['kind']}}",
                    "quantity": $quantity
                    });

                $.ajax({
                    url: $url+"/cart/add/"+$model,
                    type : "POST",
                    contentType : 'application/json',
                    data: $data,
                    success : function(result) {
                        // продукт был создан, вернуться к списку продуктов
                        alert('Товар добавлен в корзину');
                    },
                    error: function(xhr, resp, text) {
                        // вывести ошибку в консоль
                        console.log(xhr, resp, text);
                    }
                });
            });

        })
    </script>

@endsection

