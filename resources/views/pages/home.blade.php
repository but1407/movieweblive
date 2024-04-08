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
        {{-- <div class="col-xs-12 carausel-sliderWidget">
            <section id="halim-advanced-widget-4">
                <div class="section-heading">
                    <a href="danhmuc.php" title="Phim Chiếu Rạp">
                    <span class="h-text">Phim Chiếu Rạp</span>
                    </a>
                    <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                    </ul>
                </div>
                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                    <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                        <div class="halim-item">
                        <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                            <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                            <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">GÓA PHỤ ĐEN</p>
                                    <p class="original_title">Black Widow</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </article>
                    

                    
                </div>
            </section>
            <div class="clearfix"></div>
        </div> --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3    h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($phimhot as $hot )
                    
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie.detail',$hot->slug) }}" title="{{ $hot->title }}">
                                <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/'.$hot->image) }}" alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                                <span class="status">
                                    @switch($hot->resolution)
                                    @case(0)
                                        HD
                                            @break
                                    @case(1)
                                        SD
                                        @break
                                    @case(2)
                                        CAM
                                        @break
                                    @case(3)
                                        RAW
                                        @break
                                    @case(4)
                                        FullHD
                                        @break
                                    @case(5)
                                        Trailer
                                        @break
                                
                                    @default
                                        
                                @endswitch  
                                
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
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
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="{{ route('category',$cate_home->slug) }}" title="{{ $cate_home->title }}">
                        <span class="h-text">{{ $cate_home->title }}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">\
                        @if (isset($cate_home->movies))
                            @foreach ($cate_home->movies->take(10) as $movie) 
                                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                    <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie.detail',$movie->slug) }}">
                                        <figure><img class="lazy img-responsive" src="{{  asset('uploads/movie/'.$movie->image) }}" alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
                                        <span class="status">
                                            @switch($hot->resolution)
                                        @case(0)
                                            HD
                                                @break
                                        @case(1)
                                            SD
                                            @break
                                        @case(2)
                                            CAM
                                            @break
                                        @case(3)
                                            RAW
                                            @break
                                        @case(4)
                                            FullHD
                                            @break
                                        @case(5)
                                            Trailer
                                            @break
                                    
                                        @default
                                            
                                    @endswitch  
                                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if($hot->vietsub == 1)
                                                Thuyet minh
                                                
                                            @else
                                                Vietsub
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