@extends('admin.index')
@section('additional')
    <style type="text/css">
        strong {
            padding-top: 10px;
        }
        span {
            padding-top: 10px;
        }
        h3 {
            padding-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" href="/css/vendor/bootstrap-select.css">
@endsection
@section('button')
    <!-- Button to Open the Modal -->
    <button type="button" id="update-order" class="btn btn-primary" data-toggle="modal" data-target="#update-order-modal"
            style="margin-left: 20px">
        <i class="fas fa-edit"></i>
        <span>Обновить статус заказа</span>
    </button>

    <!-- The Modal -->
    <div class="modal" id="update-order-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Обновление статуса заказа</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <label for="order_status">Статус заказа:</label>
                    <select id="order_status" class="selectpicker" data-width="100%" name="order_status">
                        <option>принят</option>
                        <option>обрабатывается</option>
                        <option>у курьера</option>
                        <option>отправлен в точку самовывоза</option>
                        <option>ожидает в точке самовывоза</option>
                        <option>отправлен по почте</option>
                        <option>доставлен клиенту</option>
                    </select>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="update-order-status" class="btn btn-success" data-dismiss="modal">Подтвердить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="col-md-12">Информация о заказе</h3>
            <div class="row" style="background: white; border-radius: 10px;padding: 10px;margin-left: 10px">
                <strong class="col-md-4">Номер заказа</strong>
                <span class="col-md-8" id="orderID">{{$order->id}}</span>
                <strong class="col-md-4">ID пользователя</strong>
                <span class="col-md-8">{{$order->user_id}}</span>
                <strong class="col-md-4">Email</strong>
                <span class="col-md-8">{{$order->email}}</span>
                <strong class="col-md-4">Номер телефона</strong>
                <span class="col-md-8">{{$order->phone_number}}</span>
                <strong class="col-md-4">Имя</strong>
                <span class="col-md-8">{{$order->first_name}}</span>
                <strong class="col-md-4">Фамилия</strong>
                <span class="col-md-8">{{$order->last_name}}</span>
                <strong class="col-md-4">Способ доставки</strong>
                <span class="col-md-8">{{$order->shipping}}</span>
                <strong class="col-md-4">Адрес доставки</strong>
                <span class="col-md-8">{{$order->address}}</span>
                <strong class="col-md-4">Стоимость доставки</strong>
                <span class="col-md-8">{{$order->shipping_price}}</span>
                <strong class="col-md-4">Стоимость заказа</strong>
                <span class="col-md-8">{{$order->total}}</span>
                <strong class="col-md-4">Заказ оплачен</strong>
                <span class="col-md-8">@if($order->is_paid) Да @else Нет @endif</span>
                <strong class="col-md-4">Способ оплаты</strong>
                <span class="col-md-8">{{$order->billing_method}}</span>
                <strong class="col-md-4">Комментарий к заказу</strong>
                <span class="col-md-8">{{$order->comment}}</span>
                <strong class="col-md-4">Создан</strong>
                <span class="col-md-8">{{$order->created_at}}</span>
                <strong class="col-md-4">Последнее обновление</strong>
                <span class="col-md-8">{{$order->updated_at}}</span>
                <strong class="col-md-4">Статус заказа</strong>
                <span class="col-md-8">{{$order->order_status}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="col-md-12">Заказанные товары</h3>
            <div class="row">
                @foreach($orderProducts as $product)
                    <div class="col-md-12">
                        <div class="row" style="background: white;border-radius: 10px;padding: 10px;margin-left: 10px">
                            <img class="col-md-4" src="/storage/images/footwear/{{$product->product_id}}/{{$product->filename}}" alt="" style="border-radius: 20px">
                            <div class="col-md-8">
                                <div class="row">
                                    <strong class="col-md-6">ID продукта</strong>
                                    <span class="col-md-6">{{$product->product_id}}</span>
                                    <strong class="col-md-6">Цвет</strong>
                                    <span class="col-md-6">{{$product->color}}</span>
                                    <strong class="col-md-6">Размер модели</strong>
                                    <span class="col-md-6">{{$product->size}}</span>
                                    <strong class="col-md-6">Бренд</strong>
                                    <span class="col-md-6">{{$product->brand}}</span>
                                    <strong class="col-md-6">Вид обуви</strong>
                                    <span class="col-md-6">{{$product->kind}}</span>
                                    <strong class="col-md-6">Количество</strong>
                                    <span class="col-md-6">{{$product->count}}</span>
                                    <strong class="col-md-6">Цена одной модели</strong>
                                    <span class="col-md-6">{{$product->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('additionalJS')
    <script src="/js/vendor/bootstrap-select.js" type="text/javascript"></script>
    <script src="/js/admin/orderPage.js"></script>
@endsection
