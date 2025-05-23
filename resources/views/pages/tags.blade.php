@extends('layout')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">
                                        Phim theo tag</a> » <span class="breadcrumb_last"
                                        aria-current="page">{{ $tag }}</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>Tags: {{ $tag }}</span></h1>
                </div>
                <div class="halim_box">
                    @if (isset($movies))
                        @foreach ($movies as $movie)
                            {{-- @dd($movie) --}}
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie.detail', $movie->slug) }}"
                                        title="{{ $movie->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $movie->image) }}" alt="{{ $movie->title }}"
                                                title="{{ $movie->title }}"></figure>
                                        <span class="status">
                                            @php
                                                $options =array('0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'Trailer');
                                            @endphp
                                            {{ $options[$movie->resolution] }}
                                        </span>
                                        @if ($movie->resolution != 5)
                                            <span class="episode">
                                                @if ($movie->thuocphim == 0)
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    {{ $movie->vietsub == 1 ? 'Thuyết minh' :'Vietsub' }}
                                                    @else
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    {{ $movie->vietsub ==1 ? " Vietsub" : " Thuyết minh" }}
                                                @endif
                                            </span>
                                        @endif
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie->title }}</p>
                                                <p class="original_title">{{ $movie->name_eng }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    <ul class='page-numbers'>
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="">2</a></li>
                        <li><a class="page-numbers" href="">3</a></li>
                        <li><span class="page-numbers dots">&hellip;</span></li>
                        <li><a class="page-numbers" href="">55</a></li>
                        <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
                    </ul>
                </div>
            </section>
        </main>
        @include('pages.partials.sidebar')
    </div>
@endsection
