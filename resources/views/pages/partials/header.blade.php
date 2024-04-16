<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
        <div class="col-md-3 col-sm-6 slogan">
            <p class="site-title"><a class="logo" href="" title="phim hay ">Phim Hay</p>
            </a>
        </div>
        <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
            <div class="header-nav">

                <div class="col-xs-12">
                    <style type="text/css">
                        ul#result{
                            position: absolute;
                            z-index: 9999;
                            background: #1b2d3c;
                            width: 94%;
                            padding: 10px;
                            margin: 1px;
                        }
                    </style>

                    <div class="form-group form-search"></div>
                        <div class="input-group col-xs-12">
                            <form action="{{ route('search') }}" method="get">

                            <input id="search" type="text" name="search" 
                            class="form-control" placeholder="Tìm kiếm..." 
                            autocomplete="off" required>
                            <button class="btn btn-primary">Tìm kiếm</button>
                            <i class="animate-spin hl-spin4 hidden"></i>
                        </form>

                        </div>
                    <ul id="result" class="list-group" style="display: none" ></ul>

                </div>
            </div>
        </div>
        <div class="col-md-4 hidden-xs">
            <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div>
            <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                <ul style="margin: 0;"></ul>
            </div>
        </div>
        </div>
    </div>
</header>
<div class="navbar-container">
    <div class="container">
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
            <span class="hl-search" aria-hidden="true"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
            Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
            <span class="count">0</span>
            </button>
            <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
            <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="halim">
            <div class="menu-menu_1-container">
                <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                    <li class="current-menu-item active"><a title="Trang Chủ" href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="mega dropdown">
                        <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach ($genre as $gen)
                                    <li><a title="{{ $gen->title }}" href="{{ route('genre',['slug'=>$gen->slug]) }}">{{ $gen->title }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="mega dropdown">
                        <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                        <ul role="menu" class=" dropdown-menu">
                            @foreach ($country as $key => $cou)
                                <li><a title="{{ $cou->title }}" href="{{ route('country',['slug'=>$cou->slug]) }}">{{ $cou->title }}</a></li>
                            @endforeach
                            
                        </ul>
                    </li>
                    @foreach ( $category as $key => $cate)
                        
                        <li class="mega"><a title="{{ $cate->title }}" href="{{ route('category',['slug'=>$cate->slug]) }}">{{ $cate->title }}</a></li>
                    @endforeach
                    <li class="mega dropdown">
                    <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                         
                        @for ($year = 1990; $year <= Carbon\Carbon::now()->year;$year ++)
                            <li><a title="Phim 2020" href="{{ route('year',$year) }}">Phim {{ $year }}</a></li>
                        @endfor
                    
                    </ul>
                    </li>
                    

                </ul>
            </div>
            <ul class="nav navbar-nav navbar-left" style="background:#000;">
                <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
            </ul>
        </div>
        </nav>
        <div class="collapse navbar-collapse" id="search-form">
        <div id="mobile-search-form" class="halim-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
        <div id="mobile-user-login"></div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row fullwith-slider"></div>
</div>