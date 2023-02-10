@extends('admin.layouts.main')
@section('content')
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

            <h1 class="h6 mb-0 lh-1">Категорії товару</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="row">
        @foreach($categories as $category)
            <div class="col">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="title">Категорія {{ $num++ }}</label>
                        <input class="form-control" type="text" id="title" name="title"
                               value="{{ old('title') !== null ? old('title') : $category->title }}">
                        @error('title')
                        <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                        @enderror
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                    </div>
                </form>
            </div>
        @endforeach
        </div>
    </div>
    <div class="d-flex text-center p-3 my-3 bg-warning rounded shadow-sm">

        <h1 class="h6 mb-0 lh-1">Підкатегорії товару</h1>

    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="row">
            @foreach($categories as $category)
                <div class="col">
                    @foreach($category->subcategories as $subcategory)
                            <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <input class="form-control" type="text" id="title" name="title"
                                           value="{{ old('title') !== null ? old('title') : $subcategory->title }}">
                                    @error('title')
                                    <p class="text-danger">Не більше 255 символов.</p>
                                    @enderror
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Зберегти</button>
                                </div>
                            </form>
                        <div class="mb-3 text-center">
                            <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-primary">Видалити</button>
                            </form>
                        </div>
                    @endforeach
                        <form action="{{ route('admin.subcategories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="text" id="title" name="title">
                                <input class="form-control" type="hidden" id="category_id" name="category_id" value="{{ $category->id }}">
                                @error('title')
                                <p class="text-danger">Не більше 255 символов та не меньше 1.</p>
                                @enderror
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Зберегти</button>
                            </div>
                        </form>
                </div>
            @endforeach
        </div>
    </div>

@endsection
