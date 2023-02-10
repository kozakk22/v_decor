@extends('layouts.main')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Оплата товарів</h1>
                <p class="lead text-muted">{{ $shop->payment_rules }}</p>
            </div>
        </div>
    </section>
@endsection
