@extends('layouts.app')

@section('title')
    <title>{{ $title }}</title>
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
                    @if (!isset($genre))
                        {!! Form::open(['route' => 'genre.store','method' => 'post']) !!}
                        
                    @else
                        {!! Form::open(['route' => ['genre.update',$genre->id],'method' => 'put']) !!}
                        
                    @endif
                        
                        <div class="form-group">
                            {!! Form::label('Title', 'Title', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('desciption', 'Desciption', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($genre) ?  $genre->status : '' ,['class'=>'form-control']) !!}
                        </div>
                        @if (!isset($genre))
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
                        <td>{!! $list->status == 0 ? '<span class="btn btn-danger btn-xs">Chưa kích hoạt</span>' : '<span class="btn btn-success btn-xs">Kích hoạt</span>' !!}</td>

                        {{-- <td>{{ $list-> }}</td> --}}
                        <td>
                            {!! Form::open([
                                'method'=>'delete',
                                'route'=>['genre.destroy',$list->id],
                                'onsubmit'=>'return confirm("Xóa?")'
                            ]) !!}
                                {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{ route('genre.edit',['genre'=> $list->id]) }}" class="btn btn-warning">Sửa</a>

                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
