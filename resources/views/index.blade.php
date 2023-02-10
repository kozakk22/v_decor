@extends('layouts.main')

@section('content')
    <div class="container p-4 p-md-5 mb-4">
        <div class="px-0 text-center">

            <h1 class="display-5 fst-itali mb-4">{{ $shop->description }}</h1>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col">{{ $category->title }}:<br>

                            @if(isset($filters[$category->id.'_all']) && $filters[$category->id.'_all'] == false)
                            <a href="{{ route('index', ['subcategory' => $category->id.'_all'], )}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            </svg>
                                Всі
                            </a><br>
                            @else
                            <a href="{{ route('index', ['subcategory' => $category->id.'_all'], )}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                            </svg>
                                Всі
                            </a><br>
                            @endif

                    @foreach($category->subcategories as $subcategory)
                        @php($flag = false)
                        @foreach($subcategory->goods as $goood)
                            @php($flag = true)
                        @endforeach
                        @if($flag === true)

                                @if(isset($filters[$category->id.'_'.$subcategory->id]) && $filters[$category->id.'_'.$subcategory->id] == true)
                                    <a href="{{ route('index', ['subcategory' => $category->id.'_'.$subcategory->id.'n'] )}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                    </svg>
                                        {{ $subcategory->title }}
                                    </a><br>
                                @else
                                    <a href="{{ route('index', ['subcategory' => $category->id.'_'.$subcategory->id.'y'] )}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    </svg>
                                        {{ $subcategory->title }}
                                    </a><br>
                                @endif

                        @endif
                    @endforeach
                    </div>
                @endforeach
                <div class="col">Сортування:<br>

                        @if(isset($filters['popular']) && $filters['popular'] == false)
                        <a href="{{ route('index', ['subcategory' => 'popular'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        </svg>
                            популярні
                        </a><br>
                        @else
                                <a href="{{ route('index', ['subcategory' => 'popular'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                        </svg>
                                    популярні
                                </a><br>
                        @endif


                            @if(isset($filters['expansive']) && $filters['expansive'] == true)
                                    <a href="{{ route('index', ['subcategory' => 'expansive'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                </svg>
                                        від дорогих до дешевих
                                    </a><br>
                            @else
                                            <a href="{{ route('index', ['subcategory' => 'expansive'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                                від дорогих до дешевих
                                            </a><br>
                            @endif


                            @if(isset($filters['cheap']) && $filters['cheap'] == true)
                                <a href="{{ route('index', ['subcategory' => 'cheap'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                </svg>
                                    від дешевих до дорогих
                                </a><br>
                            @else
                                <a href="{{ route('index', ['subcategory' => 'cheap'])}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                    від дешевих до дорогих
                                </a><br>
                            @endif

                        <a href="{{ route('index')}}" methods="get" enctype="multipart/form-data" class="text-dark" style="text-decoration: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            </svg>
                            зняття налаштувань
                        </a>


               </div>
            </div>
            <form class="py-4 col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('index') }}" method="get" enctype="multipart/form-data">
                <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Пошук..." aria-label="Search" @isset($search) value="{{  $search  }}" @endisset>
                <button class="btn btn-warning" type="submit">Пошук</button>
                </div>
            </form>

        </div>
    </div>

    <div class="album bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($goods as $good)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('card', $good->id) }}" >
                                <img src="{{ url('storage/' . $good->image_main) }}" alt="image_main" class="bd-placeholder-img card-img-top" width="100%" ></a>
                            <div class="card-body text-center">
                                <p class="card-text fs-4">{{ $good->title }}</p>
                                <p class="card-text">{{ $good->price }} грн.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $goods->onEachSide(10)->links() }}</div>

        </div>
    </div>
@endsection
