@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="album bg-light py-5">
    <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                        @if(isset($good->image_main))
                            @php $max = 1; @endphp
                        @endif
                        @if(isset($good->image_0))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_1))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_2))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_3))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_4))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_5))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_6))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_7))
                            @php $max++; @endphp
                        @endif
                        @if(isset($good->image_8))
                            @php $max++; @endphp
                        @endif
                    @if(isset($good->image_main))
                        @php $big_image = 1; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_main) }}" alt="image_main" width="19%" >

                    @endif
                    @if(isset($good->image_0))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_0) }}" alt="image_0" width="19%" >

                    @endif
                    @if(isset($good->image_1))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_1) }}" alt="image_1" width="19%" >

                    @endif
                    @if(isset($good->image_2))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_2) }}" alt="image_2" width="19%" >

                    @endif
                    @if(isset($good->image_3))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_3) }}" alt="image_3" width="19%" >

                    @endif
                        @if(isset($good->image_4))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_4) }}" alt="image_4" width="19%" >

                        @endif
                        @if(isset($good->image_5))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_5) }}" alt="image_5" width="19%" >

                        @endif
                        @if(isset($good->image_6))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_6) }}" alt="image_6" width="19%" >

                        @endif
                        @if(isset($good->image_7))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_7) }}" alt="image_7" width="19%" >

                        @endif
                        @if(isset($good->image_8))
                            @php $big_image++; @endphp
                            <img onclick="Big_image({{ $big_image }}, {{ $max }})" src="{{ url('storage/' . $good->image_8) }}" alt="image_8" width="19%" >

                        @endif
                </div>
                <div class="col  align-self-center text-center">
                    <p class="card-text fs-3"> {{ $good->title }}</p>
                </div>
                <div class="col carousel slide" data-bs-ride="carousel">
                        @if(isset($good->image_main))
                            @php $big_image_id = 1; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_main) }}" alt="image_main" width="100%" id="{{ $big_image_id }}" style="display:inline">
                        @endif
                        @if(isset($good->image_0))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_0) }}" alt="image_0" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_1))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_1) }}" alt="image_1" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_2))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_2) }}" alt="image_2" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_3))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_3) }}" alt="image_3" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_4))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_4) }}" alt="image_4" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_5))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_5) }}" alt="image_5" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_6))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_6) }}" alt="image_6" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_7))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_7) }}" alt="image_7" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                        @if(isset($good->image_8))
                            @php $big_image_id++; @endphp
                            <img class="card-img-top" src="{{ url('storage/' . $good->image_8) }}" alt="image_8" width="100%" id="{{ $big_image_id }}" style="display:none">
                        @endif
                    <button onclick="prev({{ $max }})" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" id="prev" style="display:none">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button onclick="next({{ $max }})" class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next"  id="next" @if($max == 1) style="display:none" @endif>
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="col text-center">
                    <p class="card-text fs-4">Ціна: <b><span class="all_price text-success" id="all_price" data-price="{{ $good->price }}"> {{ $good->price }} </span></b> грн.</p>
                    <p class="card-text fs-5">Товар в наявності.</p>
                    <form action="{{ route('order_card', $good->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <table class="table table-borderless">
                            <tr>

                                <th scope="row"><label for="quantity">Кількість:</label></th>
                                <td colspan="2">
                                    <span class="count_price text-success" data-price="{{ $good->price }}"></span>
                                    <span class="minus"><button type="button" class="btn btn-warning">-</button></span>
                                    <input class="quantity" disabled type="text" size="3" value="{{ old('quantity') !== null ? old('quantity') : '1' }}">
                                    <input class="quantity" type="hidden" size="3" value="{{ old('quantity') !== null ? old('quantity') : '1' }}" id="quantity" name="quantity">
                                    <span class="plus"><button  type="button" class="btn btn-warning">+</button></span>
                                    @error('quantity')
                                    <p class="text-danger">Поле обов'язкове. Тільки цифри.</p>
                                    @enderror
                                </td>

                            </tr>
                            <tr>
                                <th scope="row"><label for="phone_number">Номер телефону:</label></th>
                                <td colspan="2">
                                    <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') !== null ? old('phone_number') : '' }}">
                                    @error('phone_number')
                                    <p class="text-danger">Поле обов'язкове. Невірний формат номеру телефона. Максимум 19 символів.</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="fio">Прізвище Им'я:</label></th>
                                <td colspan="2">
                                    <input class="form-control" type="text" id="fio" name="fio" value="{{ old('fio') !== null ? old('fio') : '' }}">
                                    @error('fio')
                                    <p class="text-danger">Не більше 255 символів</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="city">Місто:</label></th>
                                <td colspan="2">
                                    <input class="form-control" type="text" id="city" name="city" value="{{ old('city') !== null ? old('city') : '' }}">
                                    @error('city')
                                    <p class="text-danger">Не більше 255 символів</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="post_number">Номер відділення НОВОЇ ПОЧТИ:</label></th>
                                <td colspan="2">
                                    <input class="form-control" type="text" id="post_number" name="post_number" value="{{ old('post_number') !== null ? old('post_number') : '' }}">
                                    @error('post_number')
                                    <p class="text-danger">Не більше 255 символів</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="mail">E-mail:</label></th>
                                <td colspan="2">
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
                    <form action="{{ route('card', $good->id) }}" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="cart" value="{{ $good->id }}">
                        <button type="submit" class="btn btn-warning btn-lg mt-4">Додати в корзину</button>
                    </form>



                </div>
            </div>
        <div class="row">
            <div class="col text-center mt-4">
                <p class="card-text fs-5"> {{ $good->description }}</p>
            </div>
        </div>
        <div class="mt-4">
            <p class="card-text fs-5 text-secondary"> ...або замовте дзвінок. Вам передзвонять в найближчий час:</p>
            <form class="d-flex d-grid gap-2" action="{{ route('order_call') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="me-3" type="text" name="phone_number_top" placeholder="+38(0XX)XXXXXXX" aria-label="Search">
                <button class="btn btn-warning me-3" type="submit">Замовити дзвінок</button>
                @error('phone_number_top')
                <p class="text-danger">Не вірний формат номеру телефону</p>
                @enderror
            </form>
        </div>
        <div class="mt-4">
            <p class="card-text fs-5 text-secondary text-center">Схожі товари:</p>
            <div class="row">
            @foreach($good->subcategories->take(1) as $similar_subcategory)
                @foreach($similar_subcategory->goods->take(6) as $similar_good)
                        <div class="col"><a href="{{ route('card', $similar_good->id) }}"><img src="{{ url('storage/' . $similar_good->image_main) }}" alt="image_main" width="100%"></a></div>
                @endforeach
            @endforeach
            </div>
        </div>
</div>
    </div>
    <script>

        function Big_image(number, max)
        {
            for($i=1; $i<max+1; $i++)
            {
                if(number === $i)
                {
                    document.getElementById($i).style.display = 'inline';
                }
                else
                {
                    document.getElementById($i).style.display = 'none';
                }
            }
            if(number === 1)
            {
                document.getElementById('prev').style.display = 'none';
            }
            else
            {
                document.getElementById('prev').style.display = 'inline';
            }
            if(number === max)
            {
                document.getElementById('next').style.display = 'none';
            }
            else
            {
                document.getElementById('next').style.display = 'inline';
            }
        }
        function prev(max) {

                for($i=2; $i<max+2; $i++)
                {
                    if (document.getElementById($i) && document.getElementById($i).style.display === 'inline')
                    {
                        document.getElementById($i - 1).style.display = 'inline';
                        if($i === max+1)
                        {
                            document.getElementById('next').style.display = 'none';
                        }
                        else
                        {
                            document.getElementById('next').style.display = 'inline';
                        }
                        if($i === 2)
                        {
                            document.getElementById('prev').style.display = 'none';
                        }
                        else
                        {
                            document.getElementById('prev').style.display = 'inline';
                        }

                    }
                    else {
                        document.getElementById($i - 1).style.display = 'none';
                    }
                }

        }
        function next(max) {

            for($i=max-1; $i>=0; $i--)
            {
                if (document.getElementById($i) && document.getElementById($i).style.display === 'inline')
                {
                    document.getElementById($i + 1).style.display = 'inline';
                    if($i === max-1)
                    {
                        document.getElementById('next').style.display = 'none';
                    }
                    else
                    {
                        document.getElementById('next').style.display = 'inline';
                    }
                    if($i === 0)
                    {
                        document.getElementById('prev').style.display = 'none';
                    }
                    else
                    {
                        document.getElementById('prev').style.display = 'inline';
                    }

                }
                else {
                    document.getElementById($i + 1).style.display = 'none';
                }
            }

        }
    </script>
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

                    document.getElementById('all_price').innerHTML = count * $price.data('price');
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
