<meta charset="utf-8" />
<meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="theme-color" content="#234556">
<meta http-equiv="Content-Language" content="vi" />
<meta content="VN" name="geo.region" />
<meta name="DC.language" scheme="utf-8" content="vi" />
<meta name="language" content="Việt Nam">
<link rel="shortcut icon"
    href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
    type="image/x-icon" />
<meta name="revisit-after" content="1 days" />
<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
@yield('title')
<meta name="description" content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
<link rel="canonical" href="">
<link rel="next" href="" />

<meta property="canonical" href="{{ Request::url() }}" />

<meta property="og:locale" content="vi_VN" />
<meta property="og:title" content="{{ $meta_title ?? '' }}" />
<meta property="og:description"
    content="{{ $meta_description ?? ''  }}" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:site_name" content="{{ $meta_title ?? '' }}" />
<meta property="og:image" content="" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="55" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel='dns-prefetch' href='//s.w.org' />

<link rel='stylesheet' id='bootstrap-css' href='{{ asset('layout/css/bootstrap.min.css?ver=5.7.2') }}' media='all' />
<link rel="stylesheet" href="{{ asset('layout/footer/footer.css') }}">
<link rel='stylesheet' id='style-css' href='{{ asset('layout/css/style.css?ver=5.7.2') }}' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='{{ asset('layout/css/style.css?ver=5.7.2') }}' media='all' />
<script type='text/javascript' src='{{ asset('layout/js/jquery.min.js?ver=5.7.2') }}' id='halim-jquery-js'></script>
<style type="text/css" id="wp-custom-css">
    .textwidget p a img {
        width: 100%;
    }
</style>
{{-- <link rel="stylesheet" href="{{ asset('layout/home/home.css') }}"> --}}
<style>
    #header .site-title {
        background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;
        background-size: contain;
        text-indent: -9999px;
    }
</style>

@yield('css')
