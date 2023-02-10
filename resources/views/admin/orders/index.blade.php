@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

        <h1 class="h6 mb-0 lh-1">
            Замовлення
        </h1>

    </div>
    <div class="text-center p-3 my-3 rounded shadow-sm">
        <a href="{{ route('admin.orders.switch') }}" class="btn btn-warning">
            @if($switch === true)
                Показати не закриті замовлення
            @else
                Показати всі замовлення
            @endif
        </a>
    </div>
    @php($all_price = 0)
    @php($old_order_id = 0)
    @foreach($orders as $order)
        @if($old_order_id != $order->order_id)
            @if($old_order_id != 0)
                <tr><td></td><td class="text-center">Всього: {{ $all_price }} грн.</td><td></td><td></td><td></td><td></td></tr>
                @php($all_price = 0)
                </tbody>
            </table>
        </div>
            @endif
    <div class="d-flex my-3 p-3 bg-body rounded shadow-sm">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col" style="width: 20%">Товар</th>
                <th scope="col">Замовник</th>
                <th scope="col">Нотатки</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                <th scope="col">Редагувати</th>
            </tr>
            </thead>
                <tbody>
        @endif
                @if ($order->order_id != 0)
                <tr class="text-center">
                    <td>
                        <img src="{{ url('storage/' . $order->good->image_main)  }}" alt="image" style="width:100px;"><br>
                        {{ $order->good->title }}
                    </td>
                    <td>
                        {{ $order->customer->city }}<br>
                        {{ $order->customer->phone_number }}<br>
                        {{ $order->customer->fio }}<br>
                        Відділення: {{ $order->customer->post_number }}<br>
                        Оплата: @if($order->type_payment_id == 1) <div class="text-danger">При отриманні</div>
                        @elseif($order->type_payment_id == 2) <div class="text-danger">На картку</div> @endif
                        Кількість: {{ $order->quantity }}<br>
                        Ціна: {{ $order->price * $order->quantity }} грн.
                    </td>
                    <td>{{ $order->addition }}</td>
                    <td>
                        @if($order->called == 0 && $order->sent == 0 && $order->returned == 0 && $order->money_received == 0 && $order->reason_for_not_sending == null)
                            <div @if($order->reason_for_not_sending == '') class="text-danger" @endif >Очікує дзвінка.</div><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="btn btn-primary">
                                Подзвонено
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                                </button>
                            </form>
                        @elseif($order->called == 1 && $order->sent == 0 && $order->returned == 0 && $order->money_received == 0 && $order->reason_for_not_sending == null)
                            <div @if($order->reason_for_not_sending == '') class="text-danger" @endif >Подзвонено.</div><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="3">
                                <button type="submit" class="btn btn-primary">
                                Відправлено
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>

                                </button>
                            </form><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                Не подзвонено
                                </button>
                            </form>
                        @elseif($order->called == 1 && $order->sent == 1 && $order->returned == 0 && $order->money_received == 0 && $order->reason_for_not_sending == null)
                            <div class="text-danger">Відправлено.</div><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="5">
                                <button type="submit" class="btn btn-primary">
                                Гроші забрано
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>

                                </button>
                            </form><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                Не відправлено
                                </button>
                            </form>
                        @elseif($order->called == 1 && $order->sent == 1 && $order->returned == 0 && $order->money_received == 1 && $order->reason_for_not_sending == null)
                            Гроші забрано.<br><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="3">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                Гроші не забрано
                                </button>
                            </form>
                        @elseif($order->called == 1 && $order->sent == 1 && $order->returned == 1 && $order->money_received == 0 && $order->reason_for_not_sending == null)
                            Повенуто.<br><br>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="3">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Не повернуто
                                </button>
                            </form>
                        @elseif($order->reason_for_not_sending != null)
                            Не відправлено по причині: {{ $order->reason_for_not_sending }}<br><br>

                        @endif
                    </td>

                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Редагувати</a></td>
                </tr>
                @else
                    <tr class="text-center">
                        <td>
                            Замовлення дзвінка
                        </td>
                        <td>
                            {{ $order->customer->phone_number }}<br>
                        </td>
                        <td></td>
                        <td>
                            @if($order->called == 0)
                                <div @if($order->reason_for_not_sending == '') class="text-danger" @endif >Очікує дзвінка.</div><br>
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="2">
                                    <button type="submit" class="btn btn-primary">
                                        Подзвонено
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <div>Подзвонено.</div><br>
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                        </svg>
                                        Не подзвонено
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" id="form" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-primary">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @php($all_price = $all_price + ($order->price * $order->quantity))
                @php($old_order_id = $order->order_id)
        @endforeach
                </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $orders->onEachSide(10)->links() }}</div>
<script>
    function Hidden() {
        document.getElementById('button').style.display = 'none';
        document.getElementById('form').style.display = 'inline';
    }
    function BackHidden() {
        document.getElementById('form').style.display = 'none';
        document.getElementById('button').style.display = 'inline';
    }
</script>
@endsection
