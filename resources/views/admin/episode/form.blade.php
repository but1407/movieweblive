@extends('layouts.app')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('js')
    <script src="{{ asset('layout/episode/index.js') }}" type="text/javascript">
        window.selectMovieUrl = "http://127.0.0.1:8000/select-movie";
    </script>
    
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
                            {!! Form::select('movie_id',['0'=>'Chọn phim','phim'=>$list_movie],isset($episode)  ? $episode->movie_id  : '' ,['class'=>'form-control select_movie']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link_movie', 'Đường dẫn tới phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->movie_link : '' , ['class'=>'form-control','placeholder' => 'Nhập đường link...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link_movie', 'Chọn Tập phim', []) !!}

                            <select name="episode" class="form-control" id="show_movie">
                                
                            </select>
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
    </div>
</div>


@endsection
