@extends('layouts.app')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('js')
    <script src="{{ asset('layout/category/category.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('layout/movie/movie.js') }}">
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
            
            <table class="table table-responsive" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">episode</th>
                        <th scope="col">Thoi luong</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Thuộc</th>
                        <th scope="col">Hot</th>
                        <th scope="col">Phu de</th>
                        <th scope="col">Country</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Status</th>
                        <th scope="col">Year</th>
                        <th scope="col">Resolution</th>
                        <th scope="col">Season</th>
                        <th scope="col">Topview</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Manager</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $key => $list )
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $list->title }}</td>
                            <td><a href="{{ route("admin.add_episode",$list->id) }}" class="btn btn-primary btn-sm">Thêm tập phim</a></td>
                            <td>{{ $list->episodes_count }}/{{ $list->sotap }}</td>
                            <td>{{ $list->movie_duration }}</td>
                            <td>{{ $list->description }}</td>
                            <td><img src="{{ asset('uploads/movie/'. $list->image) }}" width="110%" alt=""></td>
                            <td>{{ $list->categories->title }}</td>
                            <td>{{ $list->thuocphim == 0 ? "Phim lẻ" : "Phim bộ" }}</td>
                            <td>{!! $list->movie_hot == 0 ? '<span class="btn btn-danger btn-xs">Không</span>' : '<span class="btn btn-success btn-xs">Có</span>' !!}</td>
                            <td>{!! $list->vietsub == 0 ? 
                                '<span class="btn btn-primary btn-xs">Vietsub</span>' : 
                                '<span class="btn btn-success btn-xs">Thuyet Minh</span>' !!}
                            </td>
                            <td>{{ $list->countries->title }}</td>
                            <td>
                                @foreach ($list->movieGenres as $genre )
                                    <span class="badge badge-dark">{{ $genre->title }}</span>
                                @endforeach</td>
                            <td>{!! $list->status == 0 ? '<span class="btn btn-danger btn-xs">Chưa kích hoạt</span>' : '<span class="btn btn-success btn-xs">Kích hoạt</span>' !!}</td>
                            <td>{!! Form::selectRange('year',1990,2024,isset($list->year) ? $list->year : '',
                            ['class'=>'select-year','id'=>$list->id,'placeholder'=>"Chọn năm"]) !!}</td>
                            <td>
                                @switch($list->resolution)
                                    @case(0)
                                        <span class="btn btn-danger btn-xs">HD</span> 
                                        @break
                                    @case(1)
                                        <span class="btn btn-success btn-xs">SD</span>

                                        @break
                                    @case(2)
                                        <span class="btn btn-warning btn-xs">CAM</span>

                                        @break
                                    @case(3)
                                        <span class="btn btn-primary btn-xs">RAW</span>

                                        @break
                                    @case(4)
                                        <span class="btn btn-success btn-xs">FullHD</span>

                                        @break
                                    @case(4)
                                        <span class="btn btn-success btn-xs">Trailer</span>

                                        @break
                                    @default
                                @endswitch ()
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    {!! Form::selectRange('season', 0,20, isset($list->season) ? $list->season : '', 
                                    ['class'=>'select-season','id'=>$list->id,'placeholder'=>'Chọn mùa']) !!}
                                </form>
                            </td>
                            <td>{!! Form::select('topview', ['0'=>'Ngày','1'=>'Tuần','2'=>'tháng'],
                            isset($list->topview) ?  $list->topview : '' ,
                            ['class'=>'select-topview','id'=>$list->id, 'placeholder'=>'Chọn top']) !!}
                            <td>{{ $list->updated_at }}</td>
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
