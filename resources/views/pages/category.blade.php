@extends('layout')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('layout/category/category.css') }}">
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
                                    <a href="{{ route('category', $category_slug->slug) }}">
                                        {{ $category_slug->title }}
                                    </a>
                                    »
                                    <a href="{{ route('category', $category_slug->slug) }}">
                                        {{ $category_slug->name_eng }}
                                    </a>
                                    »
                                    <span class="breadcrumb_last" aria-current="page">
                                        2020
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section>
                    <div class="list-movie-filter" style="margin-bottom: 10px;" >
                        <div class="list-movie-filter-main">
                            <form method="get" role="search">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="list-movie-filter-item">
                                            <label for="sort" style="color:white">Sắp xếp</label>
                                            <select class="form-control select-box" name="sort">
                                                <option value="">---Sắp xếp---</option>
                                                <option {{ request()->sort == "updated_at" ? "selected" : "" }} value="updated_at">Ngày đăng</option>
                                                <option {{ request()->sort == "year"? "selected" : "" }} value="year">Năm sản xuất</option>
                                                <option {{ request()->sort == "title" ? "selected" : "" }} value="title">Tên phim</option>
                                                <option {{ request()->sort == "view" ? "selected" : "" }} value="view">Lượt xem</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">

                                        <div class="list-movie-filter-item">
                                            <label for="type" style="color:white">Định dạng</label>
                                            <select class="form-control select-box" name="type">
                                                <option selected="" value="">Mọi định dạng</option>
                                                <option {{ request()->type == "0" ? "selected" : "" }} value="0">Phim lẻ</option>
                                                <option {{ request()->type == "1" ? "selected" : "" }} value="1">Phim bộ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="list-movie-filter-item">
                                            <label for="genre" style="color:white">Thể Loại</label>
                                            <select class="form-control select-box" name="genre">
                                                <option value="">Tất cả thể loại</option>
                                                @foreach ($genres as $gen_filter )
                                                    <option {{ request()->genre == $gen_filter->id ? "selected" : "" }} value="{{ $gen_filter->id }}">{{ $gen_filter->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="list-movie-filter-item">
                                            <label for="country" style="color:white">Quốc gia</label>
                                            <select class="form-control select-box" name="country">
                                                <option value="">Tất cả quốc gia</option>
                                                @foreach ($country as $country_filter )
                                                    <option {{ request()->country == $country_filter->id ? "selected" : "" }} value="{{ $country_filter->id }}">{{ $country_filter->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="list-movie-filter-item">
                                            <label for="year" style="color:white">Năm</label>
                                            <select class="form-control select-box" name="year">
                                                <option value="">Tất cả năm</option>
                                                @for ($i = 1996; $i <= now()->year ;$i++)
                                                    <option {{ request()->year == $i ? "selected" : "" }} value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" style="margin-top: 25px" class="btn btn-primary btn-filter-movie">
                                            <span>Lọc phim</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </form>
                        </div>
                    </div>
                    <div class="section-bar clearfix">
                        <h1 class="section-title"><span>{{ $category_slug->title }}</span></h1>
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
                                                    src="{{ asset('uploads/movie/' . $movie->image) }}"
                                                    alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
                                            <span class="status">
                                                @switch($movie->resolution)
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
                                            </span>
                                            @if ($movie->resolution != 5)
                                                <span class="episode">
                                                    @if ($movie->thuocphim == 0)
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    {{ $movie->vietsub == 1 ? 'Thuyết minh' :'Vietsub' }}
                                                    @else
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                    Tập {{  $movie->episodes->count().'/'.$movie->sotap }} {{ $movie->vietsub ==1 ? " Vietsub" : " Thuyết minh" }}
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
                            <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </section>
            </main>
            @include('pages.partials.sidebar')

        </div>
    @endsection
