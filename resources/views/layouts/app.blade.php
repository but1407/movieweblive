<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        @include('layouts.partials.sidebar')
        @include('layouts.partials.header')
        <div id="page-wrapper">
            <div class="main-page">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
    @include('layouts.partials.foot')
</body>

</html>
