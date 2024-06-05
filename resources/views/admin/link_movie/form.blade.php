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
    <script src="{{ asset('layout/linkmovie/linkmovie.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ __( $title ) }}</h1></div><br>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($linkmovie))
                            {!! Form::open(['route' => 'linkmovie.store','method' => 'post']) !!}
                            
                        @else
                            {!! Form::open(['route' => ['linkmovie.update',$linkmovie->id],'method' => 'put']) !!}
                            
                        @endif
                            
                            <div class="form-group">
                                {!! Form::label('Title', 'Title', []) !!}
                                {!! Form::text('title', isset($linkmovie) ? $linkmovie->title : '' , ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('desciption', 'Desciption', []) !!}
                                {!! Form::textarea('description', isset($linkmovie) ? $linkmovie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Active', 'Active', []) !!}
                                {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($linkmovie) ?  $linkmovie->status : '' ,['class'=>'form-control']) !!}
                            </div>
                            @if (!isset($linkmovie))
                                {!! Form::submit('Thêm Link', ['class'=> 'btn btn-success']) !!}
                                
                            @else
                                {!! Form::submit('Cập nhật Link', ['class'=> 'btn btn-success']) !!}
                                
                            @endif
                            {!! Form::close() !!}
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
                {{-- <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Manager</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($lists as $key => $list )
                            
                        <tr id="{{ $list->id }}">
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->description }}</td>
                            <td>{!! $list->status == 0 ? '<span class="btn btn-danger btn-xs">Chưa kích hoạt</span>' : '<span class="btn btn-success btn-xs">Kích hoạt</span>' !!}</td>

                            <td>
                                {!! Form::open([
                                    'method'=>'delete',
                                    'route'=>['linkmovie.destroy',$list->id],
                                    'onsubmit'=>'return confirm("Xóa?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{ route('linkmovie.edit',['linkmovie'=> $list->id]) }}" class="btn btn-warning">Sửa</a>

                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
   
@endsection
