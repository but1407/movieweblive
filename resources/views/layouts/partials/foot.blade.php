<!-- new added graphs chart js-->
<script src="{{ asset('backends/admin/js/Chart.bundle.js') }}"></script>
<script src="{{ asset('backends/admin/js/utils.js') }}"></script>
<script>
    var MONTHS = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
        ],
        datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red)
                    .alpha(0.5)
                    .rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
            },
            {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue)
                    .alpha(0.5)
                    .rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
            },
        ],
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart',
                },
            },
        });
    };

    document
        .getElementById('randomizeData')
        .addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            barChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });
            });
            window.myBar.update();
        });

    var colorNames = Object.keys(window.chartColors);
    document
        .getElementById('addDataset')
        .addEventListener('click', function() {
            var colorName =
                colorNames[barChartData.datasets.length % colorNames.length];
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: [],
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });

    document.getElementById('addData').addEventListener('click', function() {
        if (barChartData.datasets.length > 0) {
            var month = MONTHS[barChartData.labels.length % MONTHS.length];
            barChartData.labels.push(month);

            for (var index = 0; index < barChartData.datasets.length; ++index) {
                //window.myBar.addData(randomScalingFactor(), index);
                barChartData.datasets[index].data.push(randomScalingFactor());
            }

            window.myBar.update();
        }
    });

    document
        .getElementById('removeDataset')
        .addEventListener('click', function() {
            barChartData.datasets.splice(0, 1);
            window.myBar.update();
        });

    document
        .getElementById('removeData')
        .addEventListener('click', function() {
            barChartData.labels.splice(-1, 1); // remove the label first

            barChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myBar.update();
        });
</script>
<!-- new added graphs chart js-->
<!-- Classie -->
<!-- for toggle left push menu script -->
<script src="{{ asset('backends/admin/js/classie.js') }}"></script>
<script>
    
</script>
<!-- //Classie -->
<!-- //for toggle left push menu script -->
<!--scrolling js-->
<script src="{{ asset('backends/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('backends/admin/js/scripts.js') }}"></script>
<!--//scrolling js-->
<!-- side nav js -->
<script src="{{ asset('backends/admin/js/SidebarNav.min.js') }}" type="text/javascript"></script>
<script>
    $('.sidebar-menu').SidebarNav();
</script>
<!-- //side nav js -->
<!-- for index page weekly sales java script -->
<script src="{{ asset('backends/admin/js/SimpleChart.js') }}"></script>
<script>
    
</script>
<!-- //for index page weekly sales java script -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('backends/admin/js/bootstrap.js') }}"></script>
<!-- //Bootstrap Core JavaScript -->

<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function()  {
        $('#tablephim').DataTable()
    });
</script>
@yield('js')
