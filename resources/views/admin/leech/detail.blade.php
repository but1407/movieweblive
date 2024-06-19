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
            {{-- {{ dd($url) }} --}}
            <table class="table-primary" id="tablephim">
                    <tr>
                        <tr>
                            
                            <th>_Id</th>
                            <th scope="row">{{ $url['movie']['_id'] }}</th>
                        </tr>

                        <tr>
                            
                            <th>Name</th>
                            <td>{{ $url['movie']['name'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Origin name</th>
                            <td>{{ $url['movie']['origin_name'] }}</td>
                        </tr>

                        <tr>
                            
                            <th scope="column">Content</th>
                            <td>{!! $url['movie']['content'] !!}</td>
                        </tr>

                        <tr>
                            
                            <th>Type</th>
                            <td>{!! $url['movie']['type'] !!}</td>
                        </tr>

                        <tr>
                            
                            <th>Status</th>
                            <td>{!! $url['movie']['status'] !!}</td>
                        </tr>

                        <tr>
                            
                            <th>Thumb Image</th>
                            <td><img src="{{ $url['movie']['thumb_url'] }}" height="80" width="80">
                            </td>
                        </tr>
                        
                        <tr>
                            
                            <th>Poster Image</th>
                            <td><img src="{{ $url['movie']['poster_url'] }}" height="80" width="80">
                            </td>
                        </tr>

                        <tr>
                            
                            <th>is_copyright</th>
                            <td>{{ $url['movie']['is_copyright'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>sub_docquyen</th>
                            <td>{{ $url['movie']['sub_docquyen'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Chiếu Rạp</th>
                            <td>{{ $url['movie']['chieurap'] == false ? 'False' : 'True' }}</td>
                        </tr>

                        <tr>
                            
                            <th>Trailer</th>
                            <td>{{ $url['movie']['trailer_url'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Time</th>
                            <td>{{ $url['movie']['time'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Episode Current</th>
                            <td>{{ $url['movie']['episode_current'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Episode Total</th>
                            <td>{{ $url['movie']['episode_total'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Quality</th>
                            <td>{{ $url['movie']['quality'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Language</th>
                            <td>{{ $url['movie']['lang'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>Actor</th>
                            <td>
                                @foreach ($url['movie']['actor'] as $actor)
                                <span class="badge badge-info">{{ $actor }}</span>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            
                            <th>Director</th>
                            <td>
                                @foreach ($url['movie']['director'] as $director)
                                    <span class="badge badge-info">{{ $director }}</span>
                                @endforeach
                            </td>
                        </tr>


                        <tr>
                            
                            <th>Category</th>
                            <td>
                                @foreach ($url['movie']['category'] as $category)
                                <span class="badge badge-info">{{ $category['name'] }}</span>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            
                            <th>Country</th>
                            <td>
                                @foreach ($url['movie']['country'] as $country)
                                <span class="badge badge-info">{{ $country['name'] }}</span>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            
                            <th>Year</th>
                            <td>{{ $url['movie']['year'] }}</td>
                        </tr>

                        <tr>
                            
                            <th>View</th>
                            <td>{{ $url['movie']['view'] }}</td>
                        </tr>
            </table>
        </div>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
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
