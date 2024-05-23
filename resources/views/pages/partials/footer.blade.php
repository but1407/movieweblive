

<div class="clearfix"></div>
<footer id="footer" class="clearfix main">
    <div class="fbox">
        <div class="fcmpbox">
            <div class="primary">
                <div class="columenu">
                    <div class="item">
                        <h3>Phim mới</h3>
                        @foreach ($categories as $category )
                            <ul>
                                <li><a href="/the-loai/phim-khoa-hoc">{{ $category->title }}</a></li>
                            </ul>
                        @endforeach
                        
                    </div>
                    <div class="item">
                        <h3>Phim hay</h3>
                        @foreach ($countries as $country )
                            <ul>
                                <li><a href="/quoc-gia/phim-au-my">Phim {{ $country->title }}</a></li>
                            </ul>
                        @endforeach
                        
                    </div>
                    <div class="item">
                        <h3>Thông tin</h3>
                        <ul>
                            <li><a href="/gioi-thieu">Giới thiệu</a></li>
                        </ul>
                        <ul>
                            <li><a href="/lien-he-chung-toi">Liên hệ chúng tôi</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                        </ul>
                        <ul>
                            <li><a href="/chinh-sach-rieng-tu">Chính sách riêng tư</a></li>
                        </ul>
                        <ul>
                            <li><a href="/khieu-nai-ban-quyen">Khiếu nại bản quyền</a></li>
                        </ul>
                    </div>
                </div>
                <div class="fotlogo">
                    <div class="logo">
                        <img src="https://phimmoiiii.net/wp-content/uploads/2023/03/phimmoi.png"
                            alt="Phimmoi">
                        </div>
                    <div class="text">
                        <p><a href="https://phimmoiiii.net"><b>Phimmoi</b></a> - Trang xem phim Online với giao diện mới
                            được bố trí và thiết kế thân thiện với người dùng. Nguồn phim được tổng hợp từ các website lớn
                            với đa dạng các đầu phim và thể loại vô cùng phong phú.</p>
                    </div>
                </div>
            </div>
            <div class="copy">© Phimmoi</div><span class="top-page"><a id="top-page"><i
                        class="fas fa-angle-up"></i></a></span>
            <div class="fmenu">
                {{-- <ul id="menu-footer" class="menu">
                    <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a
                            href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a
                            href="#"><i class="fab fa-twitter"></i></a></li>
                    <li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16"><a
                            href="#"><i class="fab fa-instagram"></i></a></li>
                    <li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17"><a
                            href="#"><i class="fab fa-youtube"></i></a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</footer>
<div id='easy-top'></div>

