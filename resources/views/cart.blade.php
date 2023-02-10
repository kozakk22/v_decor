@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Кошик</h1>
                @if(isset($goods) && $goods != '')
                <form action="{{ route('order_cart') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <table class="table mt-5">
                    @php($all_price = 0)
                    @foreach($goods as $good)
                        <tr>
                            <th scope="row" style="width: 50%">
                                <a href="{{ route('card', $good->id) }}"><img src="{{ url('storage/' . $good->image_main) }}" alt="image_main" width="50%" ></a><br>
                                {{ $good->title }}
                            </th>
                            <td>
                                Кількість:<br>
                                <span class="minus"><button type="button" class="btn btn-warning">-</button></span>
                                <input class="quantity" disabled type="text" size="3" value="1"/>
                                <input class="quantity" type="hidden" size="3" value="1" id="quantity" name="quantity[]">
                                <input type="hidden" name="goods[]" value="{{ $good->id }}">
                                <span class="plus"><button  type="button" class="btn btn-warning">+</button></span>

                                <p class="mt-3">Ціна: <b><span class="count_price" data-price="{{ $good->price }}"> {{ $good->price }} </span></b><span> грн.</span></p>
                            </td>
                            <td>
                                <a href="{{ route('delete_cart', $good->id) }}" class="text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @php($all_price = $all_price + $good->price)
                    @endforeach
                        <tr>
                            <th></th>
                            <td><p class="mt-3">Всього: <b><span class="all_price text-success" id="all_price" data-price="{{ $all_price }}"> {{ $all_price }} </span></b><span> грн.</span></p></td>
                            <td></td>
                        </tr>
                </table>


                <table class="table mt-5">
                    <tr>
                        <th scope="row"><label for="phone_number">Номер телефону:</label></th>
                        <td>
                            <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') !== null ? old('phone_number') : '' }}">
                            @error('phone_number')
                            <p class="text-danger">Поле обов'язкове. Невірний формат номеру телефона. Максимум 19 символів.</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="fio">Прізвище Им'я:</label></th>
                        <td>
                            <input class="form-control" type="text" id="fio" name="fio" value="{{ old('fio') !== null ? old('fio') : '' }}">
                            @error('fio')
                            <p class="text-danger">Не більше 255 символів</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"  style="width: 50%"><label for="city">Місто:</label></th>
                        <td>
                            <input class="form-control" type="text" id="city" name="city" value="{{ old('city') !== null ? old('city') : '' }}">
                            @error('city')
                            <p class="text-danger">Не більше 255 символів</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="post_number">Номер відділення НОВОЇ ПОЧТИ:</label></th>
                        <td>
                            <input class="form-control" type="text" id="post_number" name="post_number" value="{{ old('post_number') !== null ? old('post_number') : '' }}">
                            @error('post_number')
                            <p class="text-danger">Не більше 255 символів</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mail">E-mail:</label></th>
                        <td>
                            <input class="form-control" type="text" id="mail" name="mail" value="{{ old('mail') !== null ? old('mail') : '' }}">
                            @error('mail')
                            <p class="text-danger">Не вірний формат E-mail.</p>
                            @enderror
                        </td>
                    </tr>
                </table>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-lg">Замовити</button>
                </div>
                </form>
                @else
                    <h3 class="fw-light mt-5">Кошик порожній</h3>
                <div class="mt-4 mt-5">
                    <div class="row">
                        @foreach($goods_bottom->take(6) as $good_bottom)
                                <div class="col"><a href="{{ route('card', $good_bottom->id) }}"><img src="{{ url('storage/' . $good_bottom->image_main) }}" alt="image_main" width="120%"></a></div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            function change($tr, val) {
                var $input = $tr.find('.quantity');
                var count = parseInt($input.val()) + val;
                if(count < 1)
                {
                    count = 1;
                    $input.val(count);
                }
                else
                {
                    $input.val(count);
                    var $price = $tr.find('.count_price');
                    $price.text(count * $price.data('price'));

                    var $all_price = document.getElementById('all_price').innerHTML;
                    var $all = $all_price*1 + count * $price.data('price') - (count - val) * $price.data('price');
                    document.getElementById('all_price').innerHTML = $all;
                }

            }
            $('.minus').click(function() {
                change($(this).closest('tr'), -1);
            });
            $('.plus').click(function() {
                change($(this).closest('tr'), 1);
            });

        });
    </script>
@endsection
