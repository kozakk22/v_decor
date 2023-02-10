@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

            <h1 class="h6 mb-0 lh-1">Редагування товару</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form action="{{ route('admin.goods.update', $good->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row"><label for="on_off">Відображення товару в каталозі</label></th>
                    <td colspan="2">
                        <div class="text-center">
                            <input type="checkbox" @if($good->on_off == true) checked="checked" @endif id="on_off" name="on_off">
                        </div>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="title">Назва товару</label></th>
                    <td colspan="2">
                        <input class="form-control" type="text" id="title" name="title" value="{{ old('title') !== null ? old('title') : $good->title }}">
                        @error('title')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="description">Опис</label></th>
                    <td colspan="2">
                        <textarea class="form-control" id="description" name="description">{{ old('description') !== null ? old('description') : $good->description }}</textarea>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="quantity_in_stoke">Кількість на складі</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="quantity_in_stoke" name="quantity_in_stoke" value="{{ old('quantity_in_stoke') !== null ? old('quantity_in_stoke') : $good->quantity_in_stoke }}">
                        @error('quantity_in_stoke')
                        <p class="text-danger">Обовязкове поле</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="price">Ціна, грн</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="price" name="price" value="{{ old('price') !== null ? old('price') : $good->price }}">
                        @error('price')
                        <p class="text-danger">Обовязкове поле</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <th scope="row"><label for="number_of_views">Підняти(більше число) або опустити<br>(меньше число) товар у списку</label></th>
                    <td colspan="2">
                        <input class="form-control" type="number" id="number_of_views" name="number_of_views"  value="{{ old('number_of_views') !== null ? old('number_of_views') : $good->number_of_views }}">
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
                                                    <option
                                                        @foreach($good->subcategories as $Good_sub)
                                                        {{ $subcategory->id === $Good_sub->id ? 'selected' : '' }}
                                                        @endforeach
                                                        value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                            @endforeach
                                </select>

                            </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row"><label for="image_main">Головне фото №1</label></th>
                    <td colspan="2">

                        <div class="input-group">
                            @if ($good->image_main)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_main)  }}" alt="image1" style="width:100px;">
                            @endif
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_main" name="image_main">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_0">Фото №2</label></th>
                    <td colspan="2">
                        <div class="input-group">
                            @if ($good->image_0)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_0)  }}" alt="image2" style="width:100px;">
                            @endif
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
                            @if ($good->image_1)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_1)  }}" alt="image3" style="width:100px;">
                            @endif
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
                            @if ($good->image_2)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_2)  }}" alt="image4" style="width:100px;">
                            @endif
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
                            @if ($good->image_3)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_3)  }}" alt="image5" style="width:100px;">
                            @endif
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
                            @if ($good->image_4)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_4)  }}" alt="image6" style="width:100px;">
                            @endif
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
                            @if ($good->image_5)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_5)  }}" alt="image7" style="width:100px;">
                            @endif
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
                            @if ($good->image_6)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_6)  }}" alt="image8" style="width:100px;">
                            @endif
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
                            @if ($good->image_7)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_7)  }}" alt="image9" style="width:100px;">
                            @endif
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
                            @if ($good->image_8)
                                <img class="custom-file me-5" src="{{ url('storage/' . $good->image_8)  }}" alt="image10" style="width:100px;">
                            @endif
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="image_8" name="image_8">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="position-relative">
                <a href="{{ route('admin.goods.index') }}" class="btn btn-primary me-5">Назад</a>
                <button type="submit" class="btn btn-primary position-absolute end-0">Зберегти</button>
            </div>
        </form><br><br>
        <div class="position-relative">
                <div class="position-absolute top-50">
                    <button onclick="Hidden()" style="display:inline" id="button" class="btn btn-primary">Видалити товар</button>
                    <form action="{{ route('admin.goods.destroy', $good->id) }}" method="post" style="display:none" id="form" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="text-danger">Видалиться цей товар та <br>всі замовлення цього товару. <br>Дійсно видалити?</div>
                        <a onclick="BackHidden()" class="btn btn-primary">Назад</a>
                        <button type="submit" class="btn btn-primary">Видалити</button>
                    </form>
                </div>
        </div>
<br><br>
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
