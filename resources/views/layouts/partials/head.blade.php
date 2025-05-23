@yield('title')
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
    content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                    function hideURLbar() { window.scrollTo(0, 1); }
  </script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap Core CSS -->
<link href="{{ asset('backends/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<!-- Custom CSS -->
<link href="{{ asset('backends/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- font-awesome icons CSS -->
<link href="{{ asset('backends/admin/css/font-awesome.css') }}" rel="stylesheet" />
<!-- //font-awesome icons CSS-->
<!-- side nav css file -->
<link href="{{ asset('backends/admin/css/SidebarNav.min.css') }}" media="all" rel="stylesheet" type="text/css" />
<!-- //side nav css file -->
<!-- js-->
<script src="{{ asset('backends/admin/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('backends/admin/js/modernizr.custom.js') }}"></script>
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
    rel="stylesheet" />
<!--//webfonts-->
<!-- chart -->
<script src="{{ asset('backends/admin/js/Chart.js') }}"></script>
<!-- //chart -->
<!-- Metis Menu -->
<script src="{{ asset('backends/admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backends/admin/js/custom.js') }}"></script>
<link href="{{ asset('backends/admin/css/custom.css') }}" rel="stylesheet" />
<!--//Metis Menu -->
<style>
    #chartdiv {
        width: 100%;
        height: 295px;
    }
</style>
<!--pie-chart -->
<!-- index page sales reviews visitors pie chart -->
<script src="{{ asset('backends/admin/js/pie-chart.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#demo-pie-1').pieChart({
        barColor: '#2dde98',
        trackColor: '#eee',
        lineCap: 'round',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
        },
    });

    $('#demo-pie-2').pieChart({
        barColor: '#8e43e7',
        trackColor: '#eee',
        lineCap: 'butt',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
        },
    });

    $('#demo-pie-3').pieChart({
        barColor: '#ffc168',
        trackColor: '#eee',
        lineCap: 'square',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
        },
    });
});
</script>
<!-- //pie-chart -->
<!-- index page sales reviews visitors pie chart -->
<!-- requried-jsfiles-for owl -->
<link href="{{ asset('backends/admin/css/owl.carousel.css') }}" rel="stylesheet" />
<script src="{{ asset('backends/admin/js/owl.carousel.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#owl-demo').owlCarousel({
            items: 3,
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
            nav: true,
        });
    });
</script>
<!-- //requried-jsfiles-for owl -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
@yield('css')

