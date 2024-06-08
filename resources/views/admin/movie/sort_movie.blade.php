@extends('layouts.app')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('css')
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
        $( "#sortable_navbar" ).sortable();
        } );
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
                    </div>
                </div>
            </div>
        @endsection
