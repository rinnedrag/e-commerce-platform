@extends('home.index')
@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area " style="margin-top: 100px">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Размер</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <tr>
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
                                        <div class="product_count">
                                            {{--<span class="input-number-decrement"> <i class="ti-minus"></i></span>--}}
                                            <input class="input-number" type="number" value="{{$details['quantity']}}"
                                                   name="{{$details['model'].'-'.$details['size'].'-quantity'}}" min="0" max="10">
                                            {{--<span class="input-number-increment"> <i class="ti-plus"></i></span>--}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$details['quantity'] * $footwearData[$details['model']][0]->price}} &#8381; </h5>
                                    </td>
                                    <td>
                                        <a href="#" id="{{$details['model'].'-'.$details['size'].'-delete'}}" class="deleteItem"><i class="fas fa-times"> Удалить</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td><h2 style="margin-top: 100px;margin-bottom: 100px">Корзина пуста</h2></td>
                                </tr>
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Общая стоимость</h5>
                            </td>
                            <td>
                                <h5>$2160.00</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li>
                                            Flat Rate: $5.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Free Shipping
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Flat Rate: $10.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li class="active">
                                            Local Delivery: $2.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                    </ul>
                                    <h6>
                                        Calculate Shipping
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select section_bg">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                    <a class="btn_1" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection

@section('additionalJS')
    <script>
        $(document).ready(function () {
            let $url = "http://127.0.0.1:8000";

            $('input[name$="-quantity"]').on('change', function (event) {
                event.preventDefault();
                let $quantity = $(this).val();
                let $name = $(this).attr('name');
                let $splitted_name = $name.split('-');

                let $data = JSON.stringify({
                    "size": $splitted_name[1],
                    "quantity": $quantity
                });

                $.ajax({
                    url: $url+"/cart/update/"+$splitted_name[0],
                    type : "PUT",
                    contentType : 'application/json',
                    data: $data,
                    success : function(result) {
                        // продукт был создан, вернуться к списку продуктов
                        alert('Товар обновлен');
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
                    url: $url+"/cart/delete/"+$splitted_id[0]+'?size='+$splitted_id[1],
                    type : "DELETE",
                    success : function(result) {
                        // продукт был создан, вернуться к списку продуктов
                        alert('Товар удалён');
                    },
                    error: function(xhr, resp, text) {
                        // вывести ошибку в консоль
                        console.log(xhr, resp, text);
                    }
                });

                $(this).parent().parent().remove();

            })
        });
    </script>
@endsection
