@extends('admin.index')
@section('additional')
    <style type="text/css">
        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50px;
            margin-left: 15px;
            margin-top: 10px;
            /*position: relative;
            cursor: pointer;*/
        }
        strong {
            padding-top: 10px;
        }
        span {
            padding-top: 10px;
        }
        h3 {
            padding-bottom: 10px;
        }
        .block-info {
            background: white; border-radius: 10px;padding: 10px;margin-left: 10px
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h3 class="col-md-6" style="margin-left: 10px">Информация о товаре</h3>
                <div class="col-md-5">
                    <button id="update-product-info" class='btn btn-primary' style="width: 40px;" data-toggle="modal" data-target="#update-product-info-modal">
                        <i class="fas fa-edit" style="text-align: center"></i>
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="update-product-info-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Обновление информации о товаре</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label for="price">Цена товара:</label>
                                    <input class="form-control" type="number" name="price" id="price" value="{{$model->price}}" min="1">
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" id="update-order-status" class="btn btn-success" data-dismiss="modal">Подтвердить</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row block-info">
                <strong class="col-md-4">ID товара</strong>
                <span class="col-md-8" id="orderID">{{$model->id}}</span>
                <strong class="col-md-4">Цвет</strong>
                <span class="col-md-8">{{$model->color}}</span>
                <strong class="col-md-4">Доступные цвета</strong>
                <div class="col-md-8">
                    <div class="row">
                      @foreach($colors as $color)
                         @if ($color->color != $model->color)
                          <a href="{{url('/admin/products/list/'.$color->id)}}" class="circle" style="background: {{$color->code}}"
                          title="{{$color->color}}"></a>
                          @endif
                        @endforeach
                    </div>
                </div>
                <strong class="col-md-4">Цена</strong>
                <span class="col-md-8">{{$model->price}}</span>
                <strong class="col-md-4">Количество покупок</strong>
                <span class="col-md-8">{{$model->purchases_count}}</span>
                <strong class="col-md-4">Бренд</strong>
                <span class="col-md-8">{{$model->brand}}</span>
                <strong class="col-md-4">Вид обуви</strong>
                <span class="col-md-8">{{$model->kind}}</span>
                <strong class="col-md-4">Пол</strong>
                <span class="col-md-8">{{$model->gender}}</span>
                <strong class="col-md-4">Сезон</strong>
                <span class="col-md-8">{{$model->season}}</span>
                <strong class="col-md-4">Вид каблука</strong>
                <span class="col-md-8">{{$model->heel_kind}}</span>
                <strong class="col-md-4">Вид застёжки</strong>
                <span class="col-md-8">{{$model->clasp_kind}}</span>
                <strong class="col-md-4">Страна-производитель</strong>
                <span class="col-md-8">{{$model->producer_country}}</span>
                <strong class="col-md-4">Полнота обуви</strong>
                <span class="col-md-8">{{$model->fitting}}</span>
                <strong class="col-md-4">Описание</strong>
                <span class="col-md-8">{{$model->description}}</span>
                <strong class="col-md-4">Создан</strong>
                <span class="col-md-8">{{$model->created_at}}</span>
                <strong class="col-md-4">Последнее обновление</strong>
                <span class="col-md-8">{{$model->updated_at}}</span>
            </div>
            <h3 class="col-md-12" style="margin-top: 20px">Материалы</h3>
            <div class="col-md-12 block-info">
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
        <div class="col-md-6">
            <div class="row">
                <h3 class="col-md-2" style="margin-left: 10px">Размеры</h3>
                <div class="col-md-9" style="margin-left: 10px">
                    <button class='btn btn-primary' style="width: 40px" data-toggle="modal" data-target="#update-sizes-modal">
                        <i class="fas fa-edit" style="text-align: center"></i>
                    </button>
                    <!-- The Modal -->
                    <div class="modal" id="update-sizes-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Обновление размеров модели</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label for="size">Размер:</label>
                                    <select class="custom-select" name="size" id="size" autocomplete="off">
                                        @foreach($sizes as $size)
                                            <option @if($loop->first) selected @endif>{{$size->size}}</option>
                                        @endforeach
                                    </select>
                                    <label for="count" style="margin-top: 5px">Количество:</label>
                                    <input class="form-control" type="number" name="count" value="{{$sizes[0]->count}}" id="count">
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" id="update-order-status" class="btn btn-success" data-dismiss="modal">Подтвердить</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row block-info">
                @foreach($sizes as $size)
                    <div class="col-md-4" style="border-style: solid; border-color: black; border-width: thin">
                        <div class="row" style="padding: 5px">
                            <strong class="col-md-10">Размер</strong>
                            <span class="col-md-2">{{$size->size}}</span>
                            <strong class="col-md-10">На складе</strong>
                            <span class="col-md-2" id="size-count-{{$size->size}}">{{$size->count}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row" style="margin-top: 20px">
                <h3 class="col-md-3" style="margin-left: 10px;">Изображения</h3>
                <div class="col-md-8">
                    <button class='btn btn-primary' style="width: 40px; margin-left: 20px">
                        <i class="fas fa-edit" style="text-align: center"></i>
                    </button>
                </div>
            </div>
            <div class="row block-info">
                @foreach($images as $image)
                    <img class="col-md-4" src="/storage/images/footwear/{{$model->id}}/{{$image->filename}}" alt="" style="border-radius: 20px">
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('additionalJS')
    <script src="/js/admin/productPage.js"></script>
@endsection
