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
                                    <h4>Профиль</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label">Имя</label>
                                            <div class="col-8">
                                                <input id="name" name="name" placeholder="Имя" class="form-control here" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label">Фамилия</label>
                                            <div class="col-8">
                                                <input id="lastname" name="lastname" placeholder="Фамилия" class="form-control here" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="town" class="col-md-4 col-form-label">Номер телефона</label>
                                            <div class="col-8">
                                                <input id="town" name="name" placeholder="Номер телефона"
                                                       class="form-control here" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label">Email</label>
                                            <div class="col-8">
                                                <input id="email" name="email" placeholder="Email"
                                                       class="form-control here" type="email" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="newpass" class="col-md-4 col-form-label">Пароль</label>
                                            <div class="col-8">
                                                <input id="newpass" type="password" name="newpass" placeholder="Пароль"
                                                       class="form-control here" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="town" class="col-md-4 col-form-label">Адрес</label>
                                            <div class="col-8">
                                                <input id="town" name="name" placeholder="Населённый пункт"
                                                       class="form-control here" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class=" col-8 offset-md-4">
                                                <button name="submit" type="submit" class="btn btn-primary">Обновить</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
