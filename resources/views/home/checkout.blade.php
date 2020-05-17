@extends('home.index')

@section('content')
    <section class="checkout_area section-padding">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Платёжная информация</h3>
                        <form id="billing_info" class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="first_name" required
                                placeholder="Имя*"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="last_name" required
                                placeholder="Фамилия*"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" required
                                placeholder="Номер телефона*"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" required
                                placeholder="Email*"/>
                            </div>
                            <div class="col-md-12 form-group p_star address-info">
                                <input type="text" class="form-control" id="add2" name="address" required
                                placeholder="Адрес*"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Условия доставки</h3>
                                    <div>
                                        <input type="radio" name="shipping" value="Курьерская доставка"
                                        checked autocomplete="off">
                                        <label>Курьерская доставка</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="shipping" value="Самовывоз" autocomplete="off">
                                        <label>Самовывоз</label>
                                    </div>
                                </div>
                                <textarea class="form-control" name="comment" id="message" rows="1"
                                          placeholder="Комментарий к заказу" style="resize: none"></textarea>
                            </div>
                        </form>
                    </div>
                    @if (session('cart'))
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Ваш заказ</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Товар
                                        <span>Стоимость</span>
                                    </a>
                                </li>
                                @foreach(session('cart') as $key => $item)
                                    <li>
                                        <a href="#">Товар {{$key}}
                                            <span class="middle">x {{$item['quantity']}}</span>
                                            <span class="last">{{$item['quantity']*$products[$item['model']][0]->price}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Стоимость товаров
                                        <span id="productsAmount">{{$productsAmount}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Доставка
                                        <span id="shippingPrice">{{$shippingPrice}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Общая стоимость
                                        <span id="totalAmount">{{$productsAmount+$shippingPrice}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="billing_method" checked
                                    value="банковская карта"/>
                                    <label for="f-option6">Оплата банковской картой </label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="accepted_terms" required
                                value="accepted_terms"/>
                                <label for="f-option4">Я прочитал и принял</label>
                                <a href="#" style="font-size: 10px">условия пользовательского соглашения*</a>
                            </div>
                            <button id="payment" class="btn_3" style="width: 100%">Перейти к оплате</button>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection

@section('additionalJS')
    <script src="/js/home/checkout.js"></script>
@endsection
