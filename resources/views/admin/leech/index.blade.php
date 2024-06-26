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
    <div class="container">
        <div class="row justify-content-center">
            <table class="table" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">_Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Origin name</th>
                        <th scope="col">Thumb Image</th>
                        <th scope="col">Poster Image</th>
                        <th scope="col">Year</th>
                        <th scope="col">Season</th>
                        <th scope="col">Imdb vote_count</th>
                        <th scope="col">Imdb vote_average</th>
                        <th scope="col">Manager</th>
                    </tr>
                </thead>
                <tbody class="order_position">
                    @foreach ($urls['items'] as $key => $url)
                        <tr id="{{ $url['_id'] }}">
                            <th scope="row">{{ $url['_id'] }}</th>
                            <td>{{ $url['name'] }}</td>
                            <td>{{ $url['origin_name'] }}</td>
                            <td><img src="{{ $urls['pathImage'] . $url['thumb_url'] }}" height="80" width="80">
                            </td>
                            <td><img src="{{ $urls['pathImage'] . $url['poster_url'] }}" height="80" width="80">
                            </td>
                            <td>{{ $url['year'] }}</td>
                            <td>{{ $url['tmdb']['season'] }}</td>
                            <td>{{ $url['tmdb']['vote_count'] }}</td>
                            <td><span
                                    style="{{ $url['tmdb']['vote_average'] >= 5 ? 'color:green=' : 'color:red' }}">{{ $url['tmdb']['vote_average'] }}</span>
                            </td>
                            <td>
                                <a href="{{ route('leech_detail', $url['slug']) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('leech_episode', $url['slug']) }}" class="btn btn-dark">Episode</a>

                                @php
                                    $movie = \App\Models\Movie::where('slug',$url['slug'])->first()
                                @endphp
                                @if (!$movie)
                                    
                                    <form action="{{ route('leech_store', $url['slug']) }}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-success" value="Add Movie">
                                    </form>
                                    @else
                                        <form action="{{ route('leech_destroy', $movie->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete Movie">
                                        </form>
                                @endif
                            </td>
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
