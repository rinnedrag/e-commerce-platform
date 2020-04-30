<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                                <a href="index.html"><img src="/images/home/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/home')}}">Главная</a></li>
                                        <li><a href="{{url('/catalog')}}">Каталог</a></li>
                                        <li class="hot"><a href="#">Новинки</a>
                                            <ul class="submenu">
                                                <li><a href="product_list.html"> Product list</a></li>
                                                <li><a href="single-product.html"> Product Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Блог</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Контакты</a></li>
                                        @guest
                                            @else
                                            <li><a href="{{url('/profile')}}">Профиль</a></li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class=" d-none d-xl-block">
                                    <div class="favorit-items">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>

                                @guest
                                    <li class="d-none d-lg-block"> <a href="{{url('login')}}" class="btn-saiful header-btn">Войти</a></li>
                                @else
                                    <li class="d-none d-lg-block"> <a href="{{url('logout')}}" class="btn-saiful header-btn"
                                     onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
