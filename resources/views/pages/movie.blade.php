@extends('layout')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('layout/movie/movie.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="VW6PY75q"></script>
@endsection

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <a href="{{ route('category', $movie->categories->slug) }}">
                                        {{ $movie->categories->slug }}</a> »
                                    <span>
                                        <a href="{{ route('country', $movie->countries->slug) }}">
                                            {{ $movie->countries->title }}
                                        </a> »
                                        <span class="breadcrumb_last" aria-current="page">
                                            {{ $movie->title }}
                                        </span>
                                        <span class="breadcrumb_last" aria-current="page">
                                            @foreach ($movie->movieGenres as $gen)
                                                <a href="{{ route('genre', [$gen->slug]) }}"> {{ $gen->title }}</a> »
                                            @endforeach
                                        </span>
                                    </span>
                                    </a>
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
                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                    alt="{{ $movie->title }}">
                                @if ($movie->resolution != 5)
                                    @if ($episode_current_list_count > 0)
                                        <div class="bwa-content">
                                            <div class="loader"></div>
                                            <a href="{{ route('movie.watch', ['slug' => $movie->slug, 'tap' => $episode_fistep->episode ?? '']) }}
                                                "
                                                class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <a href="#watch_trailer" style="display: block"
                                        class="btn btn-primary watch_trailer">Xem Trailer</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }} (2021)</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item">
                                        <span style="color:#fff">Trạng Thái</span> : <span class="quality">
                                            @php
                                                $options =array('0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'Trailer');
                                            @endphp
                                            {{ $options[$movie->resolution] }}
                                        </span>
                                        <span class="episode">
                                            {{ $movie->vietsub == 1 ? ' Thuyet minh' : ' Vietsub' }}
                                        </span>
                                    </li>
                                    <li class="list-info-group-item"><span style="color:#fff">Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span style="color:#fff">Thời lượng</span> : {{ $movie->movie_duration }}
                                    </li>
                                    @if ($movie->thuocphim == 1)
                                        <li class="list-info-group-item"><span style="color:#fff">Số tập phim</span> :
                                            {{ $episode_current_list_count }}/{{ $movie->sotap }} -
                                            {{ $movie->sotap - $episode_current_list_count == 0 ? 'Hoàn Thành' : 'Chưa Hoàn thành' }}
                                        </li>
                                    @endif

                                    <li class="list-info-group-item"><span style="color:#fff">Thể loại</span> :
                                        @foreach ($movie->movieGenres as $gen)
                                            <a href="{{ route('genre', $gen->slug) }}" rel="category tag">
                                                {{ $gen->title }}
                                            </a>,
                                        @endforeach
                                    </li>
                                    <li class="list-info-group-item">
                                        <span style="color:#fff">Quốc gia</span> : <a
                                            href="{{ route('country', $movie->countries->slug) }}"
                                            rel="tag">{{ $movie->countries->title }}</a></li>
                                    <li class="list-info-group-item"><span style="color:#fff">Đạo diễn</span> : <a class="director"
                                            rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland"
                                            title="Cate Shortland">Cate Shortland</a></li>
                                    <li class="list-info-group-item last-item"
                                        style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                                        <span style="color:#fff">Diễn viên</span> :
                                        <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>,
                                    <li class="list-info-group-item">
                                        <span style="color:#fff">Tập phim mới nhất</span> :
                                        @if ($movie->thuocphim == 1)
                                            @if ($episode_current_list_count > 0)
                                                @foreach ($episode as $e)
                                                    <a href="{{ route('movie.watch', ['slug' => $movie->slug, 'tap' => $e->episode]) }}"
                                                        rel="tag">
                                                        Tập {{ $e->episode }},
                                                    </a>
                                                @endforeach
                                            @endif
                                        @elseif ($movie->thuocphim == 0)
                                            @foreach ($episode as $e)
                                                <a
                                                    href="{{ route('movie.watch', ['slug' => $movie->slug, 'tap' => $e->episode ?? '']) }}">{{ $e->episode }}</a>
                                            @endforeach
                                        @else
                                            ĐANG CẬP NHẬT
                                        @endif
                                    </li>
                                    <li style="padding: 4px">
                                        
                                        <style>
                                            .containe {
                                                display: flex;
                                                float:left;
                                                align-items: center;
                                            }
                                        </style>
                                            <div class="list-inline containe" title="Average Rating">
                                                <span style="color:#fff">Đánh giá :</span> 
                                                @for ($count= 1; $count<=5;$count++)
                                                    @php
                                                        $color = $count <= $rating ? 'color:#ffcc00;' : 'color:#ccc;';
                                                    @endphp
                                                
                                                    <div title="start_rating" 
                                                    id="{{ $movie->id }}-{{ $count }}"
                                                        data-index="{{ $count }}" 
                                                        data-movie_id="{{ $movie->id }}"
                                                        data-rating="{{ $rating }}"
                                                        class="rating"
                                                        style="cursor:pointer; {{ $color }}
                                                            font-size:30px; margin-left:10px;
                                                        "
                                                        >&#9733;</div>
                                                @endfor
                                            </div>
                                    </li>
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                Phim <a href="https://phimhay.co/goa-phu-den-38424/">{{ $movie->title }}</a> - 2021 -
                                {{ $movie->countries->title }}:
                                <p>{{ $movie->title }} &#8211; {{ $movie->description }}</p>

                            </article>
                        </div>
                    </div>
                    {{-- Tag phim --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if (isset($movie->tags))
                                    @php
                                        $tags = [];
                                        $tags = explode(',', $movie->tags);
                                    @endphp
                                    @foreach ($tags as $key => $tag)
                                        <a href="{{ route('tag', $tag) }}">{{ $tag }}</a>/
                                    @endforeach
                                @endif

                            </article>
                        </div>
                    </div>
                    {{-- LIKE & SHARE --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">LIKE & SHARE</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @php
                                    $current_url = Request::url();
                                @endphp
                                <div class="fb-like" 
                                data-href="{{ $current_url }}" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>

                            </article>
                        </div>
                    </div>

                    {{-- Trailer phim --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
                    </div>
                    @if ($movie->trailer != null)
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="watch_trailer" class="item-content">

                                    <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/{{ $movie->trailer }}?si=8tzAfjVT0YT5RjS8"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                                </article>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            {{-- Comment phim --}}
            <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Comments</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                    <article id="post-38424" class="item-content">
                        @php
                            $currentUrl = Request::url();
                        @endphp
                        <div class="fb-comments" data-href="{{ $currentUrl }}" data-width="100%" data-numposts="5">
                        </div>

                    </article>
                </div>
            </div>
            @include('pages.partials.related')
        </main>
        @include('pages.partials.sidebar')
    </div>
@endsection
