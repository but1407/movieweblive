@extends('layouts.app')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('js')
    <script src="{{ asset('layout/category/category.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layout/movie/movie.js') }}"></script>
    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('movie.index') }}" class="btn btn-primary">Liệt Kê phim</a>

                <div class="card-header">{{ __( $title ) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                        {!! Form::open(['route' => 'movie.store','method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                        
                    @else
                        {!! Form::open(['route' => ['movie.update',$movie->id],'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
                        
                    @endif
                        
                        <div class="form-group">
                            {!! Form::label('Title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...','id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Tên tiếng anh', 'Tên tiếng anh', []) !!}
                            {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...','id'=>'slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Thời lượng phim', 'Thời lượng phim', []) !!}
                            {!! Form::text('movie_duration', isset($movie) ? $movie->movie_duration : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sotap', 'Số tập phim', []) !!}
                            {!! Form::text('sotap', isset($movie) ? $movie->sotap : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('desciption', 'Desciption', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags phim', []) !!}
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($movie) ?  $movie->status : '' ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Resolution', 'Resolution', []) !!}
                            {!! Form::select('resolution', ['0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'trailer'], isset($movie) ?  $movie->status : '' ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Phụ đề', 'Phụ đề', []) !!}
                            {!! Form::select('vietsub', ['0'=>'Vietsub','1'=>'Thuyet Minh'], isset($movie) ?  $movie->vietsub : '' ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Category', []) !!}
                            {!! Form::select('category_id',$category, isset($movie) ?  $movie->category : '' ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ?  $movie->country : '' ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            
                            {!! Form::label('Genre', 'Genre', []) !!}</br>
                            {{-- {!! Form::select('genre_id', $genre , isset($movie) ?  $movie->genre : '' ,['class'=>'form-control']) !!} --}}
                            @foreach ($list_genre as $key=>$genre )
                            @if (isset($movie))
                                
                                {!! Form::checkbox('genre[]', $genre->id,isset($movie->movieGenres) && $movie->movieGenres->contains($genre->id) ? true :false  ) !!}
                                @else
                                    {!! Form::checkbox('genre[]', $genre->id,'') !!}
                            @endif
                                {!! Form::label('genre', $genre->title  ) !!}<br>
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('Hot', 'Phim Hot', []) !!}
                            {!! Form::select('hot_movie', ['1'=>'Hot','0'=>'Không '], isset($movie) ?  $movie->hot_movie : ''  ,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image', []) !!}
                            {!! Form::file('image',  ['class'=>'form-control-file']) !!}
                            @if (isset($movie))
                                <img src="{{ asset('uploads/movie/'. $movie->image) }}" width="20%" alt="">
                            @endif
                        </div>
                        @if (!isset($movie))
                            {!! Form::submit('Thêm dữ liệu', ['class'=> 'btn btn-success']) !!}
                            
                        @else
                            {!! Form::submit('Cập nhật dữ liệu', ['class'=> 'btn btn-success']) !!}
                            
                        @endif
                        {!! Form::close() !!}
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
