@extends('layouts.app')
@section('content')
    <div class="card-header"><h1>{{ __( $title ) }}</h1></div><br>
    <table class="table" id="tablephim">
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
            @foreach ($lists as $key => $list)
                <tr id="{{ $list->id }}">
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $list->title }}</td>
                    <td>{{ $list->description }}</td>
                    <td>{!! $list->status == 0
                        ? '<span class="btn btn-danger btn-xs">Chưa kích hoạt</span>'
                        : '<span class="btn btn-success btn-xs">Kích hoạt</span>' !!}</td>
                    <td>
                        {!! Form::open([
                            'method' => 'delete',
                            'route' => ['linkmovie.destroy', $list->id],
                            'onsubmit' => 'return confirm("Xóa?")',
                        ]) !!}
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        
                        <a href="{{ route('linkmovie.edit', ['id' => $list->id]) }}" class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
