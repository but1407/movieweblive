@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {!! Form::open(['route' => 'category.store','method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('Title', 'Title', []) !!}
                            {!! Form::text('title', null, ['class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('desciption', 'Desciption', []) !!}
                            {!! Form::textarea('description', null, ['style'=>'resize:none','class'=>'form-control','placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], null,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit('Thêm dữ liệu', ['class'=> 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
