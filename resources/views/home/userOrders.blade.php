@extends('home.index')
@section('content')
    <section style="margin-top: 100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 ">
                    <div class="list-group ">
                        <a href="{{url('/profile')}}" class="list-group-item list-group-item-action">Профиль</a>
                        <a href="{{url('/orders?order_status=active&page=1')}}" class="list-group-item list-group-item-action">Активные заказы</a>
                        <a href="{{url('/orders?order_status=archive&page=1')}}" class="list-group-item list-group-item-action">Архивные заказы</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Заказы</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if(count($orders) != 0)
                                    <table class='table table-bordered table-hover'>
                                        <thead>
                                        <tr>
                                            <th>Номер заказа</th>
                                            <th>На имя</th>
                                            <th>Способ доставки</th>
                                            <th>Адрес доставки</th>
                                            <th>Способ оплаты</th>
                                            <th>Стоимость заказа, Р.</th>
                                            <th>Оплачено</th>
                                            <th>Статус заказа</th>
                                        </tr>
                                        </thead>
                                        <tbody id="orders-table">
                                        @foreach($orders as $order)
                                            <tr id="{{$order->id}}">
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->first_name.' '.$order->last_name}}</td>
                                                <td>{{$order->shipping}}</td>
                                                <td>{{$order->address}}</td>
                                                <td>{{$order->billing_method}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>@if ($order->is_paid) Да @else Нет @endif </td>
                                                <td>{{$order->order_status}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$orders->withQueryString()->links()}}
                                        @else <h3>Заказов нет</h3>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
