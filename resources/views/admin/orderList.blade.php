@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <table class='table table-bordered table-hover' style="background: white">
            <thead>
            <tr>
                <th>Номер заказа</th>
                <th>UserID</th>
                <th>Способ доставки</th>
                <th>Способ оплаты</th>
                <th>Стоимость заказа, Р.</th>
                <th>Оплачено</th>
                <th>Статус заказа</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr id="{{$order->id}}">
                    <td>{{$order->id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->shipping}}</td>
                    <td>{{$order->billing_method}}</td>
                    <td>{{$order->total}}</td>
                    <td>@if ($order->is_paid) Да @else Нет @endif </td>
                    <th>{{$order->order_status}}</th>
                    <td>
                        <!-- кнопка просмотра заказа -->
                        <a href="{{url('/admin/orders/'.$order->id)}}" class='btn btn-primary m-r-10px read-one-order-button'>
                            <i class="fas fa-eye"></i>
                            <span>Просмотр</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orders->withQueryString()->links()}}
    </div>
@endsection
