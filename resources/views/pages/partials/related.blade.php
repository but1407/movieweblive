<section class="related-movies">
    <div id="halim_related_movies-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
            <h3 class="section-title">
                <span>CÓ THỂ BẠN MUỐN XEM</span>
            </h3>
        </div>
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach ($related as $relate)
                <article class="thumb grid-item post-38498">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{ route('movie.detail', $relate->slug) }}"
                            title="{{ $relate->title }}">
                            <figure><img class="lazy img-responsive"
                                    src="{{ asset('uploads/movie/' . $relate->image) }}"
                                    alt="{{ $relate->title }}" title="{{ $relate->title }}"></figure>
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
                            <span class="episode">
                                <i class="fa fa-play" aria-hidden="true"></i>
                                {{ $movie->vietsub == 1 ? 'Thuyet minh' : 'Vietsub' }}
                            </span>
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">{{ $relate->title }}</p>
                                    <p class="original_title">{{ $relate->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ asset('layout/related/related.js') }}"></script>