@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3  bg-warning rounded shadow-sm">

            <h1 class="h6 mb-0 lh-1">Товари</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ route('admin.goods.create') }}" class="btn btn-primary" >Додати товар</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Вкл</th>
                    <th scope="col">Фото</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Ціна</th>
                    <th scope="col">Кількість</th>
                    <th scope="col">Дохід</th>
                    <th scope="col">Продажів</th>
                    <th scope="col">Возвратів</th>
                    <th scope="col">Редагування</th>
                </tr>
                </thead>
                @foreach($goods as $good)
                <tbody>
                <tr>
                    <th scope="row">
                        @if($good->on_off == true) Вкл @else <div class="text-danger">Викл</div>@endif
                    </th>
                    <td><img src="{{ url('storage/' . $good->image_main)  }}" alt="image" style="width:100px;"></td>
                    <td>{{ $good->title }}</td>
                    <td>{{ $good->price }} грн.</td>
                    <td @if($good->quantity_in_stoke == 0) class="bg-danger" @endif>{{ $good->quantity_in_stoke }}</td>
                    <td>{{ $good->number_of_sales * $good->price - $good->number_of_returns * $good->price }} грн.</td>
                    <td>{{ $good->number_of_sales }}</td>
                    <td>{{ $good->number_of_returns }}</td>
                    <td><a href="{{ route('admin.goods.edit', $good->id) }}" class="btn btn-primary">Редагувати</a></td>



                </tr>
                </tbody>
                @endforeach
            </table>



    </div>
    <div class="mt-4">{{ $goods->onEachSide(30)->links() }}</div>

@endsection
