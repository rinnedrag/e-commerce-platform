@extends('admin.index')
@section('button')
    <button type="button" id="create-product" onclick='location.href="{{url('/admin/products/new')}}"' class="btn btn-primary"
    style="margin-left: 20px">
        <i class="fas fa-plus"></i>
        <span>Создать товар</span>
    </button>
@endsection
@section('content')
    <div class="container-fluid">
        <table class='table table-bordered table-hover' style="background: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Изображение</th>
                    <th>Категория</th>
                    <th>Бренд</th>
                    <th>Цвет</th>
                    <th>Цена, Р.</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
            @foreach($footwear as $model)
                <tr id="{{$model->id}}">
                    <td>{{$model->id}}</td>
                    <td><img src="/storage/images/footwear/{{$model->id}}/thumb-{{$model->filename}}" alt=""></td>
                    <td>{{$model->kind}}</td>
                    <td>{{$model->brand}}</td>
                    <td>{{$model->color}}</td>
                    <td>{{$model->price}}</td>
                    <td>
                        <!-- кнопка чтения товара -->
                        <a href="{{url('/admin/products/list/'.$model->id)}}" class='btn btn-primary m-r-10px read-one-product-button'>
                            <i class="fas fa-eye"></i>
                            <span>Просмотр</span>
                        </a>
                        <!-- кнопка удаления товара -->
                        <button class='btn btn-danger delete-product-button'>
                            <i class="fas fa-trash-alt"></i>
                            <span>Удалить</span>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$footwear->withQueryString()->links()}}
    </div>
@endsection
