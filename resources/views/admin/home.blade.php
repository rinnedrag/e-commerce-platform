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
    <link media="screen" rel="stylesheet" type="text/css" href="{{ mix("/css/vendor/bootstrap-multiselect.css") }}" >
     <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin/admin-home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
   @include('admin.sidebar')

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="form-group" id="result">

        </div>
        <form id="formCreateProduct" >
            <button class="btn btn-primary" type="submit" >Подтвердить</button>
            <div class="form-group">
                <a>Вид обуви</a>
                <select name="footwearKind" class="custom-select">
                    @foreach($footwear_kinds as $footwear_kind)
                        <option value="{{$footwear_kind->kind}}">{{$footwear_kind->kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <a>Пол</a>
                <select name="gender" class="custom-select">
                    <option value="женская">Женская</option>
                    <option value="мужская">Мужская</option>
                    <option value="детская">Детская</option>
                </select>
            </div>
            <div class="form-group">
                <a>Сезон</a>
                <select name="season" class="custom-select">
                    <option value="зима">Зима</option>
                    <option value="лето">Лето</option>
                    <option value="демисезон">Демисезон</option>
                    <option value="Круглогодичный">Круглогодичный</option>
                </select>
            </div>
            <div class="form-group">
                <a>Бренд</a>
                <select name="brand" class="custom-select">
                    @foreach($footwear_brands as $footwear_brand)
                        <option value="{{$footwear_brand->brand}}">{{$footwear_brand->brand}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <a>Вид застёжки</a>
                <select name="claspKind" class="custom-select">
                    @foreach($clasp_kinds as $clasp_kind)
                        <option value="{{$clasp_kind->kind}}">{{$clasp_kind->kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <a>Вид каблука</a>
                <select name="heelKind" class="custom-select">
                    @foreach($heel_kinds as $heel_kind)
                        <option value="{{$heel_kind->kind}}">{{$heel_kind->kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sel-fitting">Полнота обуви</label>
                <select name="fitting" class="custom-select" id="sel-fitting">
                    @foreach($fitting as $f)
                        <option value="{{$f->literal}}">{{$f->literal}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sel-country">Страна-производитель</label>
                <select name="producerCountry" class="custom-select" id="sel-country">
                    @foreach($countries as $country)
                        <option value="{{$country->country}}">{{$country->country}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <!-- Sole materials -->
                <div class="col">
                    <label for="selectSoleMaterials">Материалы подошвы</label>
                    <select multiple="multiple" id="selectSoleMaterials">
                        @foreach($materials as $material)
                            <option value="{{$material->material}}">{{$material->material}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" id="buttonSelSoleMaterials" type="button">Подтвердить</button>
                    <div id="percentSoleMaterials">
                    </div>
                </div>
                <!-- Insole materials -->
                <div class="col">
                    <label for="selectInsoleMaterials">Материалы стельки</label>
                    <select multiple="multiple" id="selectInsoleMaterials">
                        @foreach($materials as $material)
                            <option value="{{$material->material}}">{{$material->material}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" id="buttonSelInsoleMaterials" type="button">Подтвердить</button>
                    <div id="percentInsoleMaterials">
                    </div>
                </div>
                <!-- Lining materials -->
                <div class="col">
                    <label for="selectLiningMaterials">Материалы подкладки</label>
                    <select multiple="multiple" id="selectLiningMaterials">
                        @foreach($materials as $material)
                            <option value="{{$material->material}}">{{$material->material}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" id="buttonSelLiningMaterials" type="button">Подтвердить</button>
                    <div id="percentLiningMaterials">
                    </div>
                </div>
                <div class="col">
                    <label for="selectBaseMaterials">Материалы верха</label>
                    <select multiple="multiple" id="selectBaseMaterials" required>
                        @foreach($materials as $material)
                            <option value="{{$material->material}}">{{$material->material}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" id="buttonSelBaseMaterials" type="button">Подтвердить</button>
                    <div id="percentBaseMaterials">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="selectSizes">Размеры модели</label>
                <select multiple="multiple" id="selectSizes" required>
                    @foreach($sizes as $size)
                        <option value="{{$size->size}}">{{$size->size}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="selectColors">Цвета модели</label>
                <select multiple="multiple" id="selectColors" required>
                    @foreach($colors as $color)
                        <option value="{{$color->color}}">{{$color->color}}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" id="buttonSelColors" type="button">Подтвердить</button>
                <div id="colorsAdditions">
                </div>
            </div>
            <div class="form-group">
                <label for="textareaDescription">Описание товара</label>
                <textarea name="description" class="form-control" id="textareaDescription" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="inputPrice">Цена</label>
                <input name="price" class="form-control" id="inputPrice" type="text" placeholder="0" required>
            </div>
        </form>
        </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>

<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ mix('/js/vendor/jquery.multi-select.js') }}" type="text/javascript"></script>
<script src="{{ mix('/js/vendor/bootstrap-multiselect.js') }}" type="text/javascript"></script>
<script src="/js/admin/admin-home.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>

</html>

