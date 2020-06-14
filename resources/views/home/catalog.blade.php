@extends('home.index')
@section('additionalCSS')
    <link rel="stylesheet" href="/css/home/main_page/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/home/main_page/styleSingleProduct.css">
    <link rel="stylesheet" href="/css/home/main_page/font-awesome.min.css">
    <link rel="stylesheet" href="/css/vendor/bootstrap-select.css">
@endsection
@section('content')
    <!-- Category section -->
    <section class="category-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Категории</h2>
                        <select class="selectpicker" data-size="5" title="Категории" data-width="100%" name="kind">
                            @foreach($categories as $category)
                                <option>{{$category->kind}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Сезон</h2>
                        <select class="selectpicker" data-size="5" title="Сезон" data-width="100%" name="season">
                            <option>лето</option>
                            <option>зима</option>
                            <option>демисезон</option>
                            <option>круглогодичный</option>
                        </select>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Пол</h2>
                        <select class="selectpicker" data-size="5" title="Пол" data-width="100%" name="gender">
                                <option>женская</option>
                                <option>мужская</option>
                                <option>детская</option>
                        </select>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Цена</h2>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="0" data-max="5000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount" name="min_price">
                                    <input type="text" id="maxamount" name="max_price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Цвет</h2>
                        <div class="fw-color-choose">
                                @foreach($colors as $color)
                                <div class="cs-item">
                                    <input type="checkbox" name="cs" id="checkbox-{{$color->color}}" value="{{$color->color}}">
                                    <label title="{{$color->color}}" style="background: {{$color->code}};
                                        @if ($color->code == "#ffffff") border:1px solid #868c98 @endif" for="checkbox-{{$color->color}}">
                                    </label>
                                </div>
                                @endforeach
                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-sub-title">Размер</h2>
                        <select class="selectpicker" data-size="5" multiple title="Размер" name="size"
                                data-selected-text-format="count > 7" data-width="100%">
                            @foreach($sizes as $size)
                                <option>{{$size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-sub-title">Бренд</h2>
                        <select class="selectpicker" data-size="5" multiple title="Бренд" name="brand"
                                data-selected-text-format="count > 2" data-width="100%">
                            @foreach($footwear_brands as $brand)
                                <option>{{$brand->brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-widget">
                        <h3 class="fw-sub-title">Полнота обуви</h3>
                        <select class="selectpicker" data-size="5" multiple title="Полнота обуви" name="fitting"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($fitting as $f)
                                <option>{{$f->literal}} </option>
                            @endforeach
                        </select>
                        <h3 class="fw-sub-title">Вид каблука</h3>
                        <select class="selectpicker" data-size="5" multiple title="Вид каблука" name="heel_kind"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($heel_kinds as $kind)
                                <option>{{$kind->kind}}</option>
                            @endforeach
                        </select>
                        <h3 class="fw-sub-title">Вид застёжки</h3>
                        <select class="selectpicker" data-size="5" multiple title="Вид застёжки" name="clasp_kind"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($clasp_kinds as $kind)
                                <option>{{$kind->kind}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row" id="footwear_content">
                        @foreach($footwear as $model)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        {{--<div class="tag-sale">ON SALE</div>--}}
                                        <a  href="{{url('product/'.$model->id)}}">
                                            <img src="/storage/images/footwear/{{$model->id}}/{{$model->filename}}" alt=""></a>
                                        <div class="pi-links">
                                            <a href="#" class="add-card" id="{{$model->id.'-'.$model->brand.'-'.$model->kind}}">
                                                <i class="fas fa-shopping-bag"></i><span>ADD TO CART</span></a>
                                            <a href="#" class="wishlist-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6>{{$model->price}} &#8381;</h6>
                                        <p><b>{{$model->brand}}</b>\{{$model->kind}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->
@endsection

@section('additionalJS')
    <script src="/js/home/main_page/jquery.nicescroll.min.js"></script>
    <script src="/js/home/main_page/jquery.zoom.min.js"></script>
    <script src="/js/home/main_page/jquery-ui.min.js"></script>
    <script src="/js/vendor/bootstrap-select.js" type="text/javascript"></script>
    <script src="/js/home/main_page/productPage.js"></script>
    <script src="/js/home/catalog.js"></script>
    <script>
        $(document).ready(function() {
            let url = location.host;

            /*$('input[name="cs"]:checked').on('change', function (event) {
                   $('#modelsCount').replaceWith('<span id="modelsCount"></span>');
            })*/

            //TODO: доделать добавление товара в корзину через каталог. Как вариант, всплывающее окно с выбором размера

        })
    </script>
@endsection
