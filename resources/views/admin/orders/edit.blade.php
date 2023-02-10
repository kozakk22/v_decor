@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

            <h1 class="h6 mb-0 lh-1">Редагування замовлення</h1>

    </div>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            @csrf
            @method('patch')
            <table class="table text-center">
                <tbody>
                <tr>
                    <th scope="row">Товар</th>
                    <td colspan="2"><img src="{{ url('storage/' . $order->good->image_main)  }}" alt="image" style="width:300px;"><br><br><h2>{{ $order->good->title }}</h2></td>
                </tr>
                <tr>
                    <th scope="row">Дата</th>
                    <td colspan="2">{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row"><label for="quantity">Кількість</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="quantity" name="quantity" value="{{ old('quantity') !== null ? old('quantity') : $order->quantity }}">
                        @error('quantity')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="price">Ціна</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="price" name="price" value="{{ old('price') !== null ? old('price') : $order->price }}">
                        @error('price')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="type_payment_id">Тип оплати</label></th>
                    <td colspan="2">
                        <input type="radio" id="type_payment_id_1"
                               name="type_payment_id" value="1" @if($order->type_payment_id == 1) checked @endif>
                        <label for="type_payment_id_1" class="me-5">При отриманні</label>

                        <input type="radio" id="type_payment_id_2"
                               name="type_payment_id" value="2" @if($order->type_payment_id == 2) checked @endif>
                        <label for="type_payment_id_2">На банківську карту</label>

                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="addition">Нотатки</label></th>
                    <td colspan="2">
                        <textarea class="form-control" id="addition" name="addition">{{ old('addition') !== null ? old('addition') : $order->addition }}</textarea>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="status">Статус</label></th>
                    <td colspan="2">
                        <input onclick="Not_sending()" type="radio" id="status_1" name="status" value="1"
                               @if($order->called == 0 && $order->sent == 0 && $order->returned == 0 && $order->money_received == 0)
                                   checked @endif>
                        <label onclick="Not_sending()" for="status_1" class="me-5">Не подзвонено</label><br>
                        <input onclick="Not_sending()"type="radio" id="status_2" name="status" value="2"
                               @if($order->called == 1 && $order->sent == 0 && $order->returned == 0 && $order->money_received == 0)
                                   checked @endif>
                        <label onclick="Not_sending()" for="status_2" class="me-5">Подзвонено</label><br>
                        <input onclick="Nothing()" type="radio" id="status_3" name="status" value="3"
                               @if($order->called == 1 && $order->sent == 1 && $order->returned == 0 && $order->money_received == 0)
                                   checked @endif>
                        <label onclick="Nothing()" for="status_3" class="me-5">Відправлено</label><br>
                        <input onclick="Return()" type="radio" id="status_4" name="status" value="4"
                               @if($order->called == 1 && $order->sent == 1 && $order->returned == 1 && $order->money_received == 0)
                                   checked @endif>
                        <label onclick="Return()" for="status_4" class="me-5">Повернуто</label>
                        <input onclick="Nothing()" type="radio" id="status_5" name="status" value="5"
                               @if($order->called == 1 && $order->sent == 1 && $order->returned == 0 && $order->money_received == 1)
                                   checked @endif>
                        <label onclick="Nothing()" for="status_5" class="me-5">Гроші забрали</label><br>

                    </td>
                </tr>
                    <th scope="row"><label for="reason_for_not_sending">Причина не відправки</label></th>
                    <td colspan="2">
                        <textarea class="form-control" id="reason_for_not_sending" name="reason_for_not_sending"
                                  @if($order->sent == 1) disabled @endif>{{ old('reason_for_not_sending') !== null ? old('reason_for_not_sending') : $order->reason_for_not_sending }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="reason_for_return">Причина повернення</label></th>
                    <td colspan="2">
                        <textarea class="form-control" id="reason_for_return" name="reason_for_return"
                                  @if($order->returned == 0) disabled @endif>{{ old('reason_for_return') !== null ? old('reason_for_return') : $order->reason_for_return }}</textarea>
                    </td>
                </tr>
                </tbody>
            </table>
        <div class="position-relative">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary me-5">Назад</a>
        <button type="submit" class="btn btn-primary position-absolute end-0">Зберегти</button>
        </div>
    </div>
        </form>
    <div class="position-relative">
        <div class="position-absolute top-50">
            <button onclick="Hidden()" style="display:inline" id="button" class="btn btn-primary">Видалити замовлення</button>
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" style="display:none" id="form" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="text-danger">Дійсно видалити?</div>
                <a onclick="BackHidden()" class="btn btn-primary">Назад</a>
                <button type="submit" class="btn btn-primary">Видалити</button>
            </form>
        </div>
    </div>
    <br><br>
            <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

                <h1 class="h6 mb-0 lh-1">Замовник</h1>

            </div>

    <form action="{{ route('admin.customers.update', $order->customer_id) }}" method="post" enctype="multipart/form-data">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @csrf
            @method('patch')
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <table class="table text-center">
                <tbody>
                <tr>
                    <th scope="row"><label for="phone_number">Номер телефону</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') !== null ? old('phone_number') : $order->customer->phone_number }}">
                        @error('phone_number')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="fio">ФИО</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="fio" name="fio" value="{{ old('fio') !== null ? old('fio') : $order->customer->fio }}">
                        @error('fio')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="city">Місто</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="city" name="city" value="{{ old('city') !== null ? old('city') : $order->customer->city }}">
                        @error('city')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="post_number">Номер відділення</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="post_number" name="post_number" value="{{ old('post_number') !== null ? old('post_number') : $order->customer->post_number }}">
                        @error('post_number')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="mail">E-Mail</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="mail" name="mail" value="{{ old('mail') !== null ? old('mail') : $order->customer->mail }}">
                        @error('mail')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="position-relative">

                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary me-5">Назад</a>
                <button type="submit" class="btn btn-primary position-absolute end-0">Зберегти</button>

            </div>
        </div>
        </form>
    <br><br>
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

        <h1 class="h6 mb-0 lh-1">Історія покупок замовника</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table text-center">
            <thead>
            <tr class="text-center">
                <th scope="col">Фото</th>
                <th scope="col">Назва</th>
                <th scope="col">Нотатки</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                <th scope="col">Редагувати</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->customer->orders as $history_order)
                <tr class="text-center">
                    <td>
                        <img src="{{ url('storage/' . $history_order->good->image_main)  }}" alt="image" style="width:100px;"><br>
                    </td>
                    <td>{{ $history_order->good->title }}</td>
                    <td>{{ $history_order->addition }}</td>
                    <td>
                        @if($history_order->called == 0 && $history_order->sent == 0 && $history_order->returned == 0 && $history_order->money_received == 0)
                            Очікує дзвінка.
                        @elseif($history_order->called == 1 && $history_order->sent == 0 && $history_order->returned == 0 && $history_order->money_received == 0)
                            Подзвонено.
                        @elseif($history_order->called == 1 && $history_order->sent == 1 && $history_order->returned == 0 && $history_order->money_received == 0)
                            Відправлено.
                        @elseif($history_order->called == 1 && $history_order->sent == 1 && $history_order->returned == 0 && $history_order->money_received == 1)
                            Гроші забрано.
                        @elseif($history_order->called == 1 && $history_order->sent == 1 && $history_order->returned == 1 && $history_order->money_received == 0)
                            Повенуто.
                        @endif
                    </td>

                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('admin.orders.edit', $history_order->id) }}" class="btn btn-primary">Редагувати</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        <script>
            function Hidden() {
                document.getElementById('button').style.display = 'none';
                document.getElementById('form').style.display = 'inline';
            }
            function BackHidden() {
                document.getElementById('form').style.display = 'none';
                document.getElementById('button').style.display = 'inline';
            }
            function Not_sending() {
                document.getElementById('reason_for_return').disabled = true;
                document.getElementById('reason_for_not_sending').disabled = false;
            }
            function Return() {
                document.getElementById('reason_for_not_sending').disabled = true;
                document.getElementById('reason_for_return').disabled = false;
            }
            function Nothing() {
                document.getElementById('reason_for_not_sending').disabled = true;
                document.getElementById('reason_for_return').disabled = true;
            }
        </script>
@endsection
