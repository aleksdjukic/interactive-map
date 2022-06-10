@extends('adminlte::page')
@section('title', 'ADMIN | Kontrolna Tabla')
@section('content_header')
    <h1>Kontrolna Tabla</h1>
@stop
@section('content')
    <div class="row">

{{--        <div class="col-12 col-lg-3">--}}
{{--            <div class="small-box bg-1">--}}
{{--                <div class="inner">--}}
{{--                    <h3>{{$usersCount}}</h3>--}}
{{--                    <p>Broj registrovanih korisnika</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="fas fa-fw fa-user"></i>--}}
{{--                </div>--}}
{{--                <a href="{{ route('users.index') }}" class="small-box-footer">Više informacija <i--}}
{{--                        class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-12 col-lg-3">
            <div class="small-box bg-2">
                <div class="inner">
                    <h3>{{ $tuzilastvoCount }}</h3>
                    <p>Tužilaštvo</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-file"></i>
                </div>
                <a href="{{ route('tuzilastvo.index') }}" class="small-box-footer">Više informacija <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="small-box bg-3">
                <div class="inner">
                    <h3>{{ $podaciCount }}</h3>
                    <p>Ukupan broj podataka</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-database"></i></div>
                <a href="{{ route('podaci.index', ['pvk' => 0]) }}" class="small-box-footer">Više informacija <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="small-box bg-4">
                <div class="inner">
                    <h3>{{ $podaciVisokeKorupcije }}</h3>
                    <p>Ukupan broj podataka visoke korupcije</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-folder-open"></i></div>
                <a href="{{ route('podaci.index', ['pvk' => 1]) }}" class="small-box-footer">Više informacija <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="small-box bg-5">
                <div class="inner">
                    <h3>{{ $praceniPredmetiKorupcije }}</h3>
                    <p>Praćeni predmeti korupcije</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{ route('praceni-predmeti-korupcije.index') }}" class="small-box-footer">Više informacija <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-12 d-none d-lg-block">
            <iframe src="https://mapa.infopuls.net/bs/tuzilastvo/okruzno-javno-tuzilastvo-u-banjoj-luci/compare?godina=2021&tuzilastvo=kantonalno-tuzilastvo-sarajevo&godina_2=2018" seamless  frameborder="0" width="100%" height="590px"></iframe>
        </div>

    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/iframe-custom.css') }}">

@stop
{{--http://interaktivna-mapa.test/admin/js/plugins/chart.js/Chart.min.js--}}
@section('js')
    <link rel="stylesheet" href="{{ asset('admin/js/iframe-custom.js') }}">
    <script src="js/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })
            s
@stop
