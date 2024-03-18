@extends('layouts.app')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('js')
    <script src="{{ asset('layout/category/category.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                            {!! Form::label('desciption', 'Desciption', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($movie) ?  $movie->status : '' ,['class'=>'form-control']) !!}
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
                            {!! Form::label('Genre', 'Genre', []) !!}
                            {!! Form::select('genre_id', $genre , isset($movie) ?  $movie->genre : '' ,['class'=>'form-control']) !!}
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Country</th>
                        <th scope="col">Genre</th>
                        
                        <th scope="col">Status</th>
                        <th scope="col">Manager</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $key => $list )
                        
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $list->title }}</td>
                        <td>{{ $list->description }}</td>
                        <td><img src="{{ asset('uploads/movie/'. $list->image) }}" width="110%" alt=""></td>
                        <td>{{ $list->categories->title }}</td>
                        <td>{{ $list->countries->title }}</td>
                        <td>{{ $list->genres->title }}</td>

                    

                        <td>{!! $list->status == 0 ? '<span class="btn btn-danger btn-xs">Chưa kích hoạt</span>' : '<span class="btn btn-success btn-xs">Kích hoạt</span>' !!}</td>

                        {{-- <td>{{ $list-> }}</td> --}}
                        <td>
                            {!! Form::open([
                                'method'=>'delete',
                                'route'=>['movie.destroy',$list->id],
                                'onsubmit'=>'return confirm("Xóa?")'
                            ]) !!}
                                {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{ route('movie.edit',['movie'=> $list->id]) }}" class="btn btn-warning">Sửa</a>

                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
