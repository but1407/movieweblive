@extends('layouts.app')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
@endsection
@section('js')
    <script src="{{ asset('layout/category/category.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="{{ asset('layout/episode/episode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-primary">Liệt Kê tập phim</a>
    
                    <div class="card-header">{{ __( $title ) }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store','method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                            
                        @else
                            {!! Form::open(['route' => ['episode.update',$episode->id],'method' => 'put']) !!}
                            
                        @endif
                            
                            
                            <div class="form-group">
                                {!! Form::label('Movie', 'Chọn Phim', []) !!}
                                {!! Form::text('movie_title', isset($movie)  ? $movie->title  : '' ,['class'=>'form-control' ,'readonly'  ]) !!}
                                {!! Form::hidden('movie_id', isset($movie)  ? $movie->id  : '' ,['class'=>'form-control' ,'readonly'  ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('link_movie', 'Đường dẫn tới phim', []) !!}
                                {!! Form::text('movie_link', isset($episode) ? $episode->movie_link : '' , ['class'=>'form-control','placeholder' => 'Nhập đường link...']) !!}
                            </div>
                            <div class="form-group" {{ isset($episode) ? 'hidden' : '' }}>
                                {!! Form::label('choose_movie', 'Chọn Tập phim', []) !!}
    
                                <select name="episode"  class="form-control" id="show_movie">
                                    @for ($epi = 1 ; $epi <= $movie->sotap; $epi++) 
                                            @if (!$movie->episodes->pluck('episode')->contains($epi))
                                                <option value="{{ $epi }}">{{ $epi }}</option>
                                            @endif
                                    @endfor

                                    </option>
                                </select>
                            </div>
    
                            <div class="form-group" {{ !isset($episode) ? 'hidden' : '' }}>
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                {!! Form::text('episode_new', isset($episode) ? $episode->episode : '' , ['class'=>'form-control','placeholder' => 'Nhập đường link...','disabled']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('linkserver', 'Link Movie', []) !!}
                                {!! Form::select('linkserver',$link_movie, '', ['class'=>'form-control','placeholder' => 'Nhập đường link...',]) !!}
                            </div>
                            
                            @if (!isset($episode))
                                {!! Form::submit('Thêm tập phim', ['class'=> 'btn btn-success']) !!}
                                
                            @else
                                {!! Form::submit('Cập nhật tập phim', ['class'=> 'btn btn-success']) !!}
                                
                            @endif
                            {!! Form::close() !!}
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
                
            </div>
            <div class="col-md-8">
                <table class="table table-responsive" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tập phim</th>
                            <th scope="col">Link phim</th>
                            <th scope="col">Link Server</th>
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
                                    @foreach ($list_server as $server)
                                        @if ($episode->server == $server->id)
                                            {{ $server->title }}
                                        @endif
                                    @endforeach
                                </td>

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
