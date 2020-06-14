@extends('home.index')
@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area " style="margin-top: 100px">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if(session('cart'))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Размер</th>
                            <th scope="col">Цена, &#8381;</th>
                            <th scope="col">Количество, шт.</th>
                            <th scope="col">Стоимость, &#8381;</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach(session('cart') as $id => $details)
                                <tr id="{{$id}}">
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="/storage/images/footwear/{{$details['model']}}/{{$footwearData[$details['model']][0]->filename}}" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p><b>{{$details['brand']}}</b> \ {{$details['kind']}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$details['size']}}</h5>
                                    </td>
                                    <td>
                                        <h5 id="{{$id}}-price">{{$footwearData[$details['model']][0]->price}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            {{--<span class="input-number-decrement"> <i class="ti-minus"></i></span>--}}
                                            <input class="input-number" type="number" value="{{$details['quantity']}}"
                                                   name="{{$details['model'].'-'.$details['size'].'-quantity'}}" min="0" max="10">
                                            {{--<span class="input-number-increment"> <i class="ti-plus"></i></span>--}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="amount">{{$details['quantity'] * $footwearData[$details['model']][0]->price}}</h5>
                                    </td>
                                    <td>
                                        <a href="#" id="{{$details['model'].'-'.$details['size'].'-delete'}}" class="deleteItem"><i class="fas fa-times"> Удалить</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Общая стоимость</h5>
                            </td>
                            <td>
                                <h5 id="totalAmount">{{$totalPrice ?? ''}}</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">Продолжить покупки</a>
                        <a class="btn_1 checkout_btn_1" href="{{url('/checkout')}}">Перейти к оформлению заказа</a>
                    </div>
                    @else
                        <tr>
                            <td><h2 style="margin-top: 100px;margin-bottom: 100px">Корзина пуста</h2></td>
                        </tr>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection

@section('additionalJS')
    <script>
        let url = '';
        $(document).ready(function () {
            $('input[name$="-quantity"]').on('change', function (event) {
                event.preventDefault();
                let $quantity = $(this).val();
                let $name = $(this).attr('name');
                let $splitted_name = $name.split('-');

                let $data = JSON.stringify({
                    "size": $splitted_name[1],
                    "quantity": $quantity
                });

                let $id = $splitted_name[0]+'-'+$splitted_name[1];
                $('#'+$id+' .amount').html($('#'+$id+'-price').text()*$quantity);

                let totalAmount = 0;
                $('.amount').each(function() {
                   totalAmount += parseFloat($(this).text());
                });
                $('#totalAmount').html(totalAmount);

                $.ajax({
                    url: url+"/cart/update/"+$splitted_name[0],
                    type : "PUT",
                    contentType : 'application/json',
                    data: $data,
                    success : function(result) {
                        // продукт был создан, вернуться к списку продуктов
                    },
                    error: function(xhr, resp, text) {
                        // вывести ошибку в консоль
                        console.log(xhr, resp, text);
                    }
                });
            });

            $('.deleteItem').on('click', function (event) {
                event.preventDefault();
                let $id = $(this).attr('id');
                let $splitted_id = $id.split('-');

                $.ajax({
                    url: url+"/cart/delete/"+$splitted_id[0]+'?size='+$splitted_id[1],
                    type : "DELETE",
                    success : function(result) {
                        // продукт был создан, вернуться к списку продуктов
                    },
                    error: function(xhr, resp, text) {
                        // вывести ошибку в консоль
                        console.log(xhr, resp, text);
                    }
                });

                $(this).parent().parent().remove();

                let totalAmount = 0;
                $('.amount').each(function() {
                    totalAmount += parseFloat($(this).text());
                });
                $('#totalAmount').html(totalAmount);

            })
        });
    </script>
@endsection
