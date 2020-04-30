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
                    <div class="filter-widget">
                        <h2 class="fw-title">Фильтры </h2>
                        <ul class="category-menu">
                            <li><a href="#">Категории</a>
                                <ul class="sub-menu">
                                    @foreach($categories as $category)
                                        <li><a href="#">{{$category->kind}}</a>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Пол</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Женская</a>
                                    <li><a href="#">Мужская</a>
                                    <li><a href="#">Детская</a>
                                </ul>
                            </li>
                            <li><a href="#">Сезон</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Лето</a>
                                    <li><a href="#">Зима</a>
                                    <li><a href="#">Демисезон</a>
                                    <li><a href="#">Круглогодичный</a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Цена</h2>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Цвет</h2>
                        <div class="fw-color-choose">
                                @foreach($colors as $color)
                                <div class="cs-item">
                                    <input type="checkbox" name="cs" id="checkbox-{{$color->color}}">
                                    <label title="{{$color->color}}" style="background: {{$color->code}};
                                        @if ($color->code == "#ffffff") border:1px solid #868c98 @endif" for="checkbox-{{$color->color}}">
                                    </label>
                                </div>
                                @endforeach

                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Размер</h2>
                        <select class="selectpicker" data-size="5" multiple title="Размер"
                                data-selected-text-format="count > 7" data-width="100%">
                            @foreach($sizes as $size)
                                <option>{{$size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-widget">
                        <h2 class="fw-title">Бренд</h2>
                        <ul class="category-menu">
                            @foreach($footwear_brands as $brand)
                                <li><a href="#">{{$brand->brand}} <span>(2)</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h2 class="fw-title">Дополнительные фильтры</h2>
                        <h3 class="fw-sub-title">Полнота обуви</h3>
                        <select class="selectpicker" data-size="5" multiple title="Полнота обуви"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($fitting as $f)
                                <option>{{$f->literal}} </option>
                            @endforeach
                        </select>
                        <h3 class="fw-sub-title">Вид каблука</h3>
                        <select class="selectpicker" data-size="5" multiple title="Вид каблука"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($heel_kinds as $kind)
                                <option>{{$kind->kind}}</option>
                            @endforeach
                        </select>
                        <h3 class="fw-sub-title">Вид застёжки</h3>
                        <select class="selectpicker" data-size="5" multiple title="Вид застёжки"
                                data-selected-text-format="count > 1" data-width="100%">
                            @foreach($clasp_kinds as $kind)
                                <option>{{$kind->kind}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row">
                        @foreach($footwear as $model)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <div class="tag-sale">ON SALE</div>
                                        <a  href="{{url('product/'.$model->id)}}">
                                            <img src="/storage/images/footwear/{{$model->id}}/{{$model->filename}}" alt=""></a>
                                        <div class="pi-links">
                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
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
@endsection
