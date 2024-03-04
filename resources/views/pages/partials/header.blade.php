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
                    <form id="search-form-pc" name="halimForm" role="search" action="" method="GET">
                    <div class="form-group">
                        <div class="input-group col-xs-12">
                            <input id="search" type="text" name="s" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                            <i class="animate-spin hl-spin4 hidden"></i>
                        </div>
                    </div>
                    </form>
                    <ul class="ui-autocomplete ajax-results hidden"></ul>
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
                    <li class="current-menu-item active"><a title="Trang Chủ" href="index.php">Trang Chủ</a></li>
                    <li class="mega"><a title="Phim Mới" href="danhmuc.php">Phim Mới</a></li>
                    <li class="mega dropdown">
                    <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li><a title="Phim 2020" href="danhmuc.php">Phim 2020</a></li>
                        <li><a title="Năm 2019" href="danhmuc.php">Năm 2019</a></li>
                        <li><a title="Năm 2018" href="danhmuc.php">Năm 2018</a></li>
                    </ul>
                    </li>
                    <li class="mega dropdown">
                    <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li><a title="Tâm Lý" href="danhmuc.php">Tâm Lý</a></li>
                        <li><a title="Hành động" href="">Hành động</a></li>
                        <li><a title="Viễn Tưởng" href="">Viễn Tưởng</a></li>
                        <li><a title="Hoạt Hình" href="danhmuc.php">Hoạt Hình</a></li>
                        <li><a title="Kinh Dị" href="danhmuc.php">Kinh Dị</a></li>
                        <li><a title="Hài Hước" href="danhmuc.php">Hài Hước</a></li>
                        <li><a title="Hình Sự" href="danhmuc.php">Hình Sự</a></li>
                        <li><a title="Võ Thuật" href="danhmuc.php">Võ Thuật</a></li>
                        <li><a title="Cổ Trang" href="danhmuc.php">Cổ Trang</a></li>
                        <li><a title="Phim Ma" href="danhmuc.php">Phim Ma</a></li>
                        <li><a title="Tình Cảm" href="danhmuc.php">Tình Cảm</a></li>
                        <li><a title="Thể Thao - Âm Nhạc" href="danhmuc.php">Thể Thao &#8211; Âm Nhạc</a></li>
                        <li><a title="Thần Thoại" href="danhmuc.php">Thần Thoại</a></li>
                        <li><a title="Tài Liệu" href="danhmuc.php">Tài Liệu</a></li>
                        <li><a title="Phiêu Lưu" href="danhmuc.php">Phiêu Lưu</a></li>
                        <li><a title="Gia Đình" href="danhmuc.php">Gia Đình</a></li>
                        <li><a title="Chiến Tranh" href="danhmuc.php">Chiến Tranh</a></li>
                    </ul>
                    </li>
                    <li class="mega dropdown">
                    <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li><a title="Việt nam" href="danhmuc.php">Việt nam</a></li>
                        <li><a title="Ấn Độ" href="danhmuc.php">Ấn Độ</a></li>
                        <li><a title="Mỹ" href="danhmuc.php">Mỹ</a></li>
                        <li><a title="Hồng Kông" href="danhmuc.php">Hồng Kông</a></li>
                        <li><a title="Nhật Bản" href="danhmuc.php">Nhật Bản</a></li>
                        <li><a title="Trung Quốc" href="danhmuc.php">Trung Quốc</a></li>
                        <li><a title="Hàn Quốc" href="danhmuc.php">Hàn Quốc</a></li>
                        <li><a title="Đài Loan" href="danhmuc.php">Đài Loan</a></li>
                        <li><a title="Thái Lan" href="danhmuc.php">Thái Lan</a></li>
                        <li><a title="Philippin" href="danhmuc.php">Philippin</a></li>
                    </ul>
                    </li>
                    <li><a title="Phim Lẻ" href="danhmuc.php">Phim Lẻ</a></li>
                    <li><a title="Phim Bộ" href="danhmuc.php">Phim Bộ</a></li>
                    <li><a title="Phim Chiếu Rạp" href="danhmuc.php">Phim Chiếu Rạp</a></li>
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