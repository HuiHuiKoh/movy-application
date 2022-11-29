<link href="{{ asset('assets/css/styles.css') }}" rel='stylesheet' type='text/css' />
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"></script>
<script src="{{ url('"https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

<!--<link rel="stylesheet" href="{{asset('assets\css\bookUpdate.css')}}">-->


@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chart</h1>


        </div>

        <hr>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div id="chart-container" style="height: 300px;"></div>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script>
var datas = <?php echo json_encode($datas) ?>
<?php #dd (json_encode($datas))     ?>

Highcharts.chart('chart-container', {
    chart: {
        type: <?php echo json_encode($chartType) ?>
    },
    title: {
        text:<?php echo json_encode($chartTitle); ?>
    },
    xAxis: {
        categories:<?php echo json_encode($xTitle); ?>
        //                                categories:datas
    },
    yAxis: {
        title: {
            text:<?php echo json_encode($yTitle); ?>
        },
        min: 0,
        minRange: 2
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        },
        plotOptions: {
            line: {
                softThreshold: false
            }
        }
    },
    series: [{
            name:<?php echo json_encode($chartSeries); ?>,
            data: datas
        }],
    responsive: {
        rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
    }

});
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.footer');