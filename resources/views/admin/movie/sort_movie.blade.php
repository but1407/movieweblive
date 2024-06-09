@extends('layouts.app')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('backends/admin/css/sort_movie.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('backends/admin/js/sort_movie.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable_movie" ).sortable();
        });
        $( function() {
            $( "#sortable_navbar" ).sortable();
        });
        $( function() {
            $( "#sortable_navbar" ).disableSelection();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __($title) }}</h1>
                    </div><br>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                            <div class="container-fluid" >
                                <ul class="navbar-nav category_position" id="sortable_navbar">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Home</a>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li id="{{ $category->id }}" class="nav-item">
                                            <a class="nav-link" href="{{ route('category',["slug" =>  $category->slug]) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </nav>
                        @foreach ($category_home as $cate_home)
                        
                        <h5 style="text-transform:uppercase; color:blue;">Dạnh mục: {{ $cate_home->title }}</h5>
                        <div id="sortable_movie" class="row movie_position sortable_movie">
                            @foreach ($cate_home->movies->sortBy('position') as $movie)
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 box_phim" style="height: 250px; border:1px solid #d1d1d1;">
                                    <figure><img class="img-responsive"
                                        width="100%"
                                        src="{{ asset('uploads/movie/' . $movie->image) }}"
                                        alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
                                    <p class="entry-title">{{ $movie->title }}</p>
                                    <p class="original_title">{{ $movie->description }}</p>
                                </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endsection
