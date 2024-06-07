@extends('layout')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('layout/watch/watch.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="yoast_breadcrumb hidden-xs">
                                <span>
                                    <span>
                                        <a href="{{ route('genre', $movie->genres->title) }}">{{ $movie->genres->title }}</a>
                                        »
                                        <span>
                                            <a
                                                href="{{ route('country', $movie->countries->slug) }}">{{ $movie->countries->title }}</a>
                                            »
                                            <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section id="content" class="test">
                    <div class="clearfix wrap-content">
                        <style type="text/css">
                            .iframe_movie iframe {
                                width: 100%;
                                height: 500px;
                            }
                        </style>
                        <div class="iframe_movie">
                            <div class="get_id_movie hidden">{{ $movie->id }}</div>
                            {!! $episode->movie_link ?? '<img src="http://127.0.0.1:8000/images/links/404error.png" alt="Link hỏng">' !!}
                        </div>
                        <div class="collapse" id="moretool">
                            <ul class="nav nav-pills x-nav-justified">
                                <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                    data-size="small" data-show-faces="true" data-share="true"></li>
                                <div class="fb-save" data-uri="" data-size="small"></div>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="title-block">
                            <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                                    <div class="halim-pulse-ring"></div>
                                </div>
                            </a>
                            <div class="title-wrapper-xem full">
                                <h1 class="entry-title">
                                    <a href="" title="{{ $movie->title }}" class="tl">{{ $movie->title }} tập
                                        {{ $episode->episode }}
                                    </a>
                                </h1>
                            </div>
                        </div>
                        <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                            <article id="post-37976" class="item-content post-37976"></article>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <div id="halim-ajax-list-server"></div>
                        </div>
                        <div id="halim-list-server">
                            <ul class="nav nav-tabs" role="tablist">
                                @if ($movie->vietsub == 1)
                                    <li role="presentation" class="active server-1">
                                        <a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab">
                                            <i class="hl-server">
                                            </i> Thuyet minh
                                        </a>
                                    </li>
                                @else
                                    <li role="presentation" class="active server-1">
                                        <a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab">
                                            <i class="hl-server">
                                            </i> Vietsub
                                        </a>
                                    </li>
                                @endif

                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                    <div class="halim-server">
                                        <ul class="halim-list-eps">

                                            @foreach ($server as $key => $ser)
                                                <li class="halim-server">
                                                    <a
                                                        {{-- href="{{ route('movie.watch', ['slug' => $movie->slug, 'tap' => $server->server]) }}" --}}
                                                        >
                                                        
                                                        <span
                                                            class="halim-btn halim-btn-2 halim-info-1-1 box-shadow">
                                                            {{ $ser->title }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>

                                        <ul class="halim-list-eps">

                                            @foreach ($movie->episodes as $key => $episode)
                                                <li class="halim-episode">
                                                    <a
                                                        href="{{ route('movie.watch', ['slug' => $movie->slug, 'tap' => $episode->episode]) }}">
                                                        <span
                                                            class="halim-btn halim-btn-2 {{ $tapphim == $episode->episode ? 'active' : '' }} halim-info-1-1 box-shadow"
                                                            data-post-id="37976" data-server="1" data-episode="1"
                                                            data-position="first" data-embed="0"
                                                            data-title="Xem phim {{ $movie->title }} - Tập {{ $episode->episode }} - Be Together - vietsub + Thuyết Minh"
                                                            data-h1="{{ $movie->title }} - tập {{ $episode }}">
                                                            {{ $episode->episode }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="htmlwrap clearfix">
                            <div id="lightout"></div>
                        </div>
                </section>
                @include('pages.partials.related')
            </main>
            @include('pages.partials.sidebar')
        </div>
    </div>
@endsection
