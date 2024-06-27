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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
@endsection

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <table class="table-primary" id="tablephim">
                <tr>
                <tr>

                    <th>_Id</th>
                    <th scope="row">{{ $url['movie']['_id'] }}</th>
                </tr>

                <tr>

                    <th>Name</th>
                    <td>{{ $url['movie']['name'] }} => <a href="{{ route('leech_episode_store', $url['movie']['slug']) }}">Add Episode</a></td>
                </tr>

                <tr>

                    <th>Origin name</th>
                    <td>{{ $url['movie']['origin_name'] }}</td>
                </tr>
                @foreach ($url['episodes'] as $episode)
                    <tr>
                        <th>Server {{ $episode['server_name'] }}:</th>

                        <td>
                            @foreach ($episode['server_data'] as $server)
                                <li style="list-style: none; margin:10px">
                                    <span>
                                        Tập {{ $server['name'] }}
                                    </span> =>
                                    <span class="btn btn-primary">
                                        <a href="{{ $server['link_embed'] }}"
                                            style="color: #fff">{{ $server['filename'] }}</a>
                                    </span>
                                </li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            border-bottom: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
        }
    </style>
@endsection
