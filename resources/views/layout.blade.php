<!DOCTYPE html>
<html lang="vi">

<head>
    @include('pages.partials.head')
</head>

<body>
    @include('pages.partials.header')
    <div class="container">
        @yield('content')
    </div>
    <div class="clearfix"></div>

    @include('pages.partials.footer')
    @include('pages.partials.foot')
</body>

</html>
