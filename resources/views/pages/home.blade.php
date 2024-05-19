@extends('layout')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('layout/home/home.css') }}">
@endsection

@section('js')
    <script  type="" src="{{ asset('layout/home/home.js') }}"></script>
@endsection
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($phimhot as $hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie.detail', $hot->slug) }}"
                                title="{{ $hot->title }}">
                                <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/' . $hot->image) }}"
                                        alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                                <span class="status">
                                    @php
                                        $options =array('0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'Trailer');
                                    @endphp
                                    {{ $options[$hot->resolution] }}
                                </span>
                                <span class="episode">
                                    @if ($hot->thuocphim == 0)
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        {{ $hot->vietsub ==1 ? " Vietsub" : " Thuyết minh" }}
                                        @else
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        Tập {{  $hot->episodes->count().'/'.$hot->sotap }} {{ $hot->vietsub ==1 ? " Vietsub" : " Thuyết minh" }}
                                    @endif
                                </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $hot->title }}</p>
                                        <p class="original_title">{{ $hot->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                @endforeach

            </div>

        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($category_home as $cate_home)
                <section id="halim-advanced-widget-2" >
                    <div class="section-heading" >
                        <a href="{{ route('category', $cate_home->slug) }}" title="{{ $cate_home->title }}">
                            <span class="h-text">{{ $cate_home->title }}</span>
                        </a>
                        <a class="see-all" style="" href="{{ route('category',[$cate_home->slug]) }}">xem thêm</a>

                    </div>
                    <style>
                        .see-all{
                            position: absolute;
                            background: #408BEA;
                            color: #fff;
                            font-size: 10px;
                            font-weight: 300;
                            text-transform: uppercase;
                            padding: 3px 8px;
                            border-radius: 3px;
                            margin-right: 10px;
                            margin-top: 4px;
                            right: 0;
                        }
                    </style>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">\
                        @if (isset($cate_home->movies))
                            @foreach ($cate_home->movies->take(16) as $movie)
                                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                    <div class="halim-item">
                                        <a class="halim-thumb" href="{{ route('movie.detail', $movie->slug) }}">
                                            <figure><img class="lazy img-responsive"
                                                    src="{{ asset('uploads/movie/' . $movie->image) }}"
                                                    alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
                                            <span class="status">
                                                @php
                                                    $options =array('0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'Trailer');
                                                @endphp
                                                {{ $options[$movie->resolution] }}
                                            </span>
                                            <span class="episode">
                                                @if ($movie->thuocphim == 0)
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    {{ $hot->vietsub == 1 ? 'Thuyết minh' : 'Vietsub' }}
                                                    @else
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    Tập {{  $movie->episodes->count().'/'.$movie->sotap }} {{ $movie->vietsub ==1 ? " Vietsub" : " Thuyết minh" }}
                                                @endif
                                            </span>
                                            <div class="icon_overlay"></div>
                                            <div class="halim-post-title-box">
                                                <div class="halim-post-title ">
                                                    <p class="entry-title">{{ $movie->title }}</p>
                                                    <p class="original_title">{{ $movie->description }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        @endif


                    </div>
                </section>
                <div class="clearfix"></div>
            @endforeach

            <section id="halim-advanced-widget-2">

        </main>
        @include('pages.partials.sidebar')
    </div>
@endsection
