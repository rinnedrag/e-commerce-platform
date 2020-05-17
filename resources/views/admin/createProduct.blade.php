@extends('admin.index')
@section('content')

<form id="formCreateProduct" class="container-fluid" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-2">
            <a>Вид обуви</a>
            <select name="footwearKind" class="custom-select">
                @foreach($footwear_kinds as $footwear_kind)
                    <option value="{{$footwear_kind->kind}}">{{$footwear_kind->kind}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <a>Пол</a>
            <select name="gender" class="custom-select">
                <option value="женская">Женская</option>
                <option value="мужская">Мужская</option>
                <option value="детская">Детская</option>
            </select>
        </div>
        <div class="form-group col-2">
            <a>Полнота</a>
            <select name="fitting" class="custom-select" id="sel-fitting">
                @foreach($fitting as $f)
                    <option value="{{$f->literal}}">{{$f->literal}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <a>Сезон</a>
            <select name="season" class="custom-select">
                <option value="зима">Зима</option>
                <option value="лето">Лето</option>
                <option value="демисезон">Демисезон</option>
                <option value="Круглогодичный">Круглогодичный</option>
            </select>
        </div>
        <div class="form-group col-3">
            <a>Бренд</a>
            <select name="brand" class="custom-select">
                @foreach($footwear_brands as $footwear_brand)
                    <option value="{{$footwear_brand->brand}}">{{$footwear_brand->brand}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-4">
            <a>Вид застёжки</a>
            <select name="claspKind" class="custom-select">
                @foreach($clasp_kinds as $clasp_kind)
                    <option value="{{$clasp_kind->kind}}">{{$clasp_kind->kind}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-4">
            <a>Вид каблука</a>
            <select name="heelKind" class="custom-select">
                @foreach($heel_kinds as $heel_kind)
                    <option value="{{$heel_kind->kind}}">{{$heel_kind->kind}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-4">
            <label for="sel-country">Страна-производитель</label>
            <select name="producerCountry" class="custom-select" id="sel-country">
                @foreach($countries as $country)
                    <option value="{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- Sole materials -->
        <div class="form-group col-6">
            <label for="selectSoleMaterials">Материалы подошвы</label>
            <select multiple="multiple" id="selectSoleMaterials" autocomplete="off">
                @foreach($materials as $material)
                    <option value="{{$material->material}}">{{$material->material}}</option>
                @endforeach
            </select>
            <div id="percentSoleMaterials" >
            </div>
        </div>
        <!-- Insole materials -->
        <div class="form-group col-6">
            <label for="selectInsoleMaterials">Материалы стельки</label>
            <select multiple="multiple" id="selectInsoleMaterials" autocomplete="off">
                @foreach($materials as $material)
                    <option value="{{$material->material}}">{{$material->material}}</option>
                @endforeach
            </select>
            <div id="percentInsoleMaterials">
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Lining materials -->
        <div class="col-6">
            <label for="selectLiningMaterials">Материалы подкладки</label>
            <select multiple="multiple" id="selectLiningMaterials" autocomplete="off">
                @foreach($materials as $material)
                    <option value="{{$material->material}}">{{$material->material}}</option>
                @endforeach
            </select>
            <div id="percentLiningMaterials">
            </div>
        </div>
        <div class="col-6">
            <label for="selectBaseMaterials">Материалы верха</label>
            <select multiple="multiple" id="selectBaseMaterials" autocomplete="off" required>
                @foreach($materials as $material)
                    <option value="{{$material->material}}">{{$material->material}}</option>
                @endforeach
            </select>
            <div id="percentBaseMaterials">
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="form-group col-6">
            <label for="selectSizes">Размеры модели</label>
            <select multiple="multiple" id="selectSizes" required>
                @foreach($sizes as $size)
                    <option value="{{$size->size}}">{{$size->size}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-6">
            <label for="selectColors">Цвета модели</label>
            <select multiple="multiple" id="selectColors" autocomplete="off" required>
                @foreach($colors as $color)
                    <option value="{{$color->color}}">{{$color->color}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div id="colorsAdditions" class="form-group row">

    </div>
    <div class="form-group">
        <label for="textareaDescription">Описание товара</label>
        <textarea name="description" class="form-control" id="textareaDescription" rows="3" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit" >Подтвердить</button>
</form>
@endsection

