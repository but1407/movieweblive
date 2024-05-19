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
                                    @php
                                        $options =array('0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'RAW','4'=>'FullHD','5'=>'Trailer');
                                    @endphp
                                    {{ $options[$relate->resolution] }}
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