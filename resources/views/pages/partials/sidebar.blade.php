<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active filter-sidebar" id="home-tab" 
                        data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Day</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link filter-sidebar" id="profile-tab" 
                        data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Week</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link filter-sidebar" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Month</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            @foreach ($phimhot_sidebar as $movie )
                        
                            <div class="item post-37176">
                                <a href="{{ route('movie.detail',$movie->slug) }}" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="lazy post-thumb" alt="{{ $movie->title }}" title="{{ $movie->title }}" />
                                        
                                        <span class="is_trailer">Hot</span>
                                    </div>
                                    <p class="title">{{ $movie->title }}</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                       </div>
                    </div>
                 </section>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            @foreach ($phimhot_sidebar as $movie )
                                <div class="item post-37176">
                                    <a href="{{ route('movie.detail',$movie->slug) }}" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                        <div class="item-link">
                                            <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="lazy post-thumb" alt="{{ $movie->title }}" title="{{ $movie->title }}" />
                                            
                                            <span class="is_trailer">Hot</span>
                                        </div>
                                        <p class="title">{{ $movie->title }}</p>
                                    </a>
                                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                    <div style="float: left;">
                                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            @foreach ($phimhot_sidebar as $movie )
                                <div class="item post-37176">
                                    <a href="{{ route('movie.detail',$movie->slug) }}" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                        <div class="item-link">
                                            <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="lazy post-thumb" alt="{{ $movie->title }}" title="{{ $movie->title }}" />
                                            
                                            <span class="is_trailer">Hot</span>
                                        </div>
                                        <p class="title">{{ $movie->title }}</p>
                                    </a>
                                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                    <div style="float: left;">
                                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</aside>