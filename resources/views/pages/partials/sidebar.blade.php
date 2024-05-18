
<div class="sidebar" style="float:right; display:flex; flex-direction:column">
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4" >
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Top Views Phim lẻ</span>
                </div>
            </div>
            <section class="wrap">
                <div role="tabpanel" class="tab-pane halim-ajax-popular-post">
                    <div id="halim-ajax-popular-post" class="popular-post">
                        @foreach ($phimlehot as $movie)
                            <div class="item post-37176">
                                <a href="{{ route('movie.detail',$movie->slug) }}" title="{{ $movie->title }}">
                                    <div class="item-link">
                                        <img src="{{ asset('uploads/movie/'.$movie->image) }}"
                                            class="lazy post-thumb" alt="{{ $movie->title }}"
                                            title="{{ $movie->title }}" />
                                        {{-- <span class="is_trailer">Trailer</span> --}}
                                    </div>
                                    <p class="title">{{ $movie->title }}</p>
                                </a>
                                <div class="star_rating" style="display:flex;">
                                    @for($i =  1; $i <= 5; $i++)
                                    {{-- @php
                                        $color = $i <= $rating ? 'color:#ffcc00;' : 'color:#ccc;';
                                    @endphp --}}
                                        <div title="star_rating" style="font-size:26px; color:#ffcc00; margin-right:10px;">
                                            &#9733;
                                        </div>
                                    @endfor
                                </div>
                                <div class="viewsCount" style="color: #9d9d9d;">{{ number_format($movie->view) }} lượt xem</div>
                                <div class="country" style="color: #9d9d9d;">{{ $movie->genres->title . ' - ' . $movie->countries->title . '-' . $movie->year }}</div>

                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4" >
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Top Views Phim Bộ</span>
                </div>
            </div>
            <section class="wrap">
                <div role="tabpanel" class="tab-pane halim-ajax-popular-post">
                    <div id="halim-ajax-popular-post" class="popular-post">
                        @foreach ($phimbohot as $movie)
                            <div class="item post-37176">
                                <a href="{{ route('movie.detail',$movie->slug) }}" title="{{ $movie->title }}">
                                    <div class="item-link">
                                        <img src="{{ asset('uploads/movie/'.$movie->image) }}"
                                            class="lazy post-thumb" alt="{{ $movie->title }}"
                                            title="{{ $movie->title }}" />
                                        {{-- <span class="is_trailer">Trailer</span> --}}
                                    </div>
                                    <p class="title">{{ $movie->title }}</p>
                                    <div class="star_rating" style="display:flex;">
                                        @for($i =  1; $i <= 5; $i++)
                                        {{-- @php
                                            $color = $i <= $rating ? 'color:#ffcc00;' : 'color:#ccc;';
                                        @endphp --}}
                                            <div title="star_rating" style="font-size:26px; color:#ffcc00; margin-right:10px;">
                                                &#9733;
                                            </div>
                                        @endfor
                                    </div>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">{{ number_format($movie->view) }} lượt xem</div>
                                <div class="country" style="color: #9d9d9d;">{{ $movie->genres->title . ' - ' . $movie->countries->title }}</div>

                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
</div>
