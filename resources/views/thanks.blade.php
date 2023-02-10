@extends('layouts.main')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-success">
                <h1 class="fw-light"><b>Дякуємо за замовлення!</b></h1>
                <p class="lead text-muted">Ваше замовлення прийнято. В найближчий час наші менеджери зв'яжуться з вами.</p>
                <h3 class="fw-light">Інші товари:</h3>
                    <div class="row row-cols-1 row-cols-sm-2 ">
                    @foreach($goods as $good)
                        <div class="col"><a href="{{ route('card', $good->id) }}"><img src="{{ url('storage/' . $good->image_main) }}" alt="image_main" width="100%"></a></div>
                    @endforeach
                    </div>
            </div>
        </div>
    </section>
@endsection
