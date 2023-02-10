@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

            <h1 class="h6 mb-0 lh-1">Товари</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form action="{{ route('admin.goods.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row"><label for="on_off">Відображення товару в каталозі</label></th>
                    <td colspan="2">
                        <div class="text-center">
                            <input type="checkbox" checked="checked" id="on_off" name="on_off">
                        </div>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="title">Назва товару</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="title" name="title" value="{{ old('title') !== null ? old('title') : '' }}">
                        @error('title')
                        <p class="text-danger">Не більше 255 символів та не меньше 1.</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="description">Опис</label></th>
                    <td colspan="2">
                        <textarea class="form-control" id="description" name="description">{{ old('description') !== null ? old('description') : '' }}</textarea>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="quantity_in_stoke">Кількість на складі</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="quantity_in_stoke" name="quantity_in_stoke" value="{{ old('quantity_in_stoke') !== null ? old('quantity_in_stoke') : '0' }}">
                        @error('quantity_in_stoke')
                        <p class="text-danger">Обовязкове поле</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="price">Ціна, грн</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="price" name="price" value="{{ old('price') !== null ? old('price') : '0' }}">
                        @error('price')
                        <p class="text-danger">Обовязкове поле</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="number_of_views">Підняти(більше число) або опустити<br>(меньше число) товар у списку</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="number_of_views" name="number_of_views"  value="{{ old('number_of_views') !== null ? old('number_of_views') : '100' }}">
                        @error('number_of_views')
                        <p class="text-danger">Обовязкове поле</p>
                        @enderror
                    </td>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row"><label for="subcategories">{{ $category->title }}</label></th>
                            <td colspan="2">

                                <select class="form-control select2" multiple="multiple" id="subcategories" name="subcategories[]">
                                            @foreach($category->subcategories as $subcategory)

                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>

                                            @endforeach
                                </select>

                                @error($category->id)
                                <p class="text-danger">Виберіть категорію</p>
                                @enderror
                            </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row"><label for="image_main">Головне фото №1</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_main" name="image_main">
                            </div>
                            @error('image_main')
                            <p class="text-danger">Обовязкове фото</p>
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_0">Фото №2</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_0" name="image_0">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_1">Фото №3</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_1" name="image_1">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_2">Фото №4</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_2" name="image_2">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_3">Фото №5</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_3" name="image_3">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_4">Фото №6</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_4" name="image_4">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_5">Фото №7</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_5" name="image_5">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_6">Фото №8</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_6" name="image_6">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_7">Фото №9</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_7" name="image_7">
                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_8">Фото №10</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_8" name="image_8">
                            </div>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table><br>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>


    </div>


@endsection
