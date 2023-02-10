@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

        <h1 class="h6 mb-0 lh-1">Налаштування магазину</h1>

    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
                <form action="{{ route('admin.shop.update', $shop->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name_shop">Імя магазину</label>
                        <input class="form-control" type="text" id="name_shop" name="name_shop"
                               value="{{ old('name_shop') !== null ? old('name_shop') : $shop->name_shop }}">
                        @error('name_shop')
                        <p class="text-danger">Поле обов'язкове. Не більше 255 символов.</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Опис магазину (титульний заголовок магазину)</label>
                        <textarea class="form-control" id="description"
                                  name="description">{{ old('description') !== null ? old('description') :  $shop->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="keywords">Ключові слова, через кому</label>
                        <textarea class="form-control" id="keywords"
                                  name="keywords">{{ old('keywords') !== null ? old('keywords') :  $shop->keywords }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name_manager">Імя менеджера</label>
                        <input class="form-control" type="text" id="name_manager" name="name_manager"
                               value="{{ old('name_manager') !== null ? old('name_manager') : $shop->name_manager }}">
                        @error('name_manager')
                        <p class="text-danger">Не більше 255 символов.</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mail">Mail</label>
                        <input class="form-control" type="text" id="mail" name="mail"
                               value="{{ old('mail') !== null ? old('mail') : $shop->mail }}">
                        @error('mail')
                        <p class="text-danger">Введіть правильно mail адресу.</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">Номер телефона</label>
                        <input class="form-control" type="text" id="phone" name="phone"
                               value="{{ old('phone') !== null ? old('phone') : $shop->phone }}">
                        @error('phone')
                        <p class="text-danger">Не більше 255 символов.</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instagram">Instagram адреса магазину</label>
                        <input class="form-control" type="text" id="instagram" name="instagram"
                               value="{{ old('instagram') !== null ? old('instagram') : $shop->instagram }}">
                        @error('instagram')
                        <p class="text-danger">Не правильно заповнене поле</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="delivery_rules">Опис способів доставки</label>
                        <textarea class="form-control" id="delivery_rules"
                                  name="delivery_rules">{{ old('delivery_rules') !== null ? old('delivery_rules') :  $shop->delivery_rules }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment_rules">Опис способів оплати</label>
                        <textarea class="form-control" id="payment_rules"
                                  name="payment_rules">{{ old('payment_rules') !== null ? old('payment_rules') :  $shop->payment_rules }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo">Логотип</label>
                        <img src="{{ url('storage/' . $shop->logo)  }}" alt="logo" style="width:10%;">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="logo" name="logo" value="{{ $shop->logo }}">
                            </div>

                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                    </div>
                </form>
    </div>

@endsection
