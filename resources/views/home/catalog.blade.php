@extends('home.index')
@section('content')

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="/images/home/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product list</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
<section class="product_list section_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Категория<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($categories as $category)
                                    <p ><a href="#">{{$category->kind}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Цвет<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($colors as $color)
                                    <p><a href="#">{{$color->color}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Полнота обуви<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($fitting as $f)
                                    <p><a href="#">{{$f->literal}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Бренд<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($footwear_brands as $brand)
                                    <p><a href="#">{{$brand->brand}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Вид каблука<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($heel_kinds as $kind)
                                    <p><a href="#">{{$kind->kind}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Вид застёжки<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($clasp_kinds as $kind)
                                    <p><a href="#">{{$kind->kind}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Размер<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach($sizes as $size)
                                    <p><a href="#">{{$size->size}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product_list">
                    <div class="row">
                        @foreach($footwear as $model)
                            <div class="col-lg-4 col-sm-4">
                                <div class="single_product_item">
                                    <img src="{{$model->photos}}" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">{{$model->brand}}\{{$model->kind}}</a> </h3>
                                    <p>{{$model->price}}</p>
                                </div>
                            </div>
                        @endforeach
                            @foreach($footwear as $model)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single_product_item">
                                        <img src="{{$model->photos}}" alt="" class="img-fluid">
                                        <h3> <a href="single-product.html">{{$model->brand}}\{{$model->kind}}</a> </h3>
                                        <p>{{$model->price}}</p>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- swiper js -->
    <script src="/js/home/main_page/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="/js/home/main_page/mixitup.min.js"></script>
    <script src="/js/home/main_page/jquery.counterup.min.js"></script>
    <script src="/js/home/main_page/waypoints.min.js"></script>
@endsection
