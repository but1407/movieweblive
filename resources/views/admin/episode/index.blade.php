@extends('layouts.app')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection
@section('js')
    <script src="{{ asset('layout/category/category.js') }}"></script>
    <script src="{{ asset('layout/episode/episode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tập phim</th>
                            <th scope="col">Link phim</th>
                            <th scope="col">Manager</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list_episode as $key => $episode )
                            
                            <tr id="{{ $episode->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $episode->movies->title }}</td>
                                <td><img src="{{ asset('uploads/movie/'.  $episode->movies->image ) }}" width="100%" height="100%" alt=""></td>
                                <td>{{ $episode->episode }}</td>
                                <td>{!! $episode->movie_link !!}</td>
                                <td>
                                    {!! Form::open([
                                        'method'=>'delete',
                                        'route'=>['episode.destroy',$episode->id],
                                        'onsubmit'=>'return confirm("Xóa?")'
                                    ]) !!}
                                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('episode.edit',['episode'=> $episode->id]) }}" class="btn btn-warning">Sửa</a>

                                </td>
                            </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection
