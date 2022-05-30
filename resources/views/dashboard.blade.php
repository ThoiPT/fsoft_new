@extends('home')
@section('content')
    @include('report')

    <style>
        #example1_paginate {
            display: none;
        }

    </style>

{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <a class="btn btn-danger" style="font-weight: bold">Dashboard</a>--}}
{{--        </div>--}}
{{--        <!-- /.card-header -->--}}
{{--        <div class="card-body">--}}
{{--            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <table id="table-dashboard" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>--}}
{{--                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Recruit Name</th>--}}
{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vacancy Name</th>--}}

{{--                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Level</th>--}}
{{--                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Experience</th>--}}

{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Slot</th>--}}
{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach($recruit_list as $item)--}}
{{--                                <tr class="odd">--}}
{{--                                    <td> {{ $item -> department -> name ?? 'None'}}</td>--}}
{{--                                    <td>{{ $item -> title }}</td>--}}
{{--                                    <td>{{ $item -> vacancy -> name ?? 'None' }}</td>--}}
{{--                                    <td>{{ $item -> level }}</td>--}}
{{--                                    <td>{{ $item -> exp }}</td>--}}
{{--                                    @if($item -> numRecruit <= 0)--}}
{{--                                        <td>--}}
{{--                                            <small class="badge badge-danger">Full Slot</small>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td>--}}
{{--                                            <small class="badge badge-info">Available: {{$item->numRecruit}} </small>--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                    <td>{{ $item -> user -> email ?? 'None' }}</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                            <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th rowspan="1" colspan="1">Department</th>--}}
{{--                                    <th rowspan="1" colspan="1">Recruit Name</th>--}}
{{--                                    <th rowspan="1" colspan="1">Vacancy Name</th>--}}
{{--                                    <th rowspan="1" colspan="1">Total Recruit</th>--}}
{{--                                    <th rowspan="1" colspan="1">Total CV</th>--}}
{{--                                    <th rowspan="1" colspan="1">Vacancy</th>--}}
{{--                                    <th rowspan="1" colspan="1">Email</th>--}}
{{--                                </tr>--}}
{{--                            </tfoot>--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--    </div>--}}

    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Donut Chart</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class="">
                    </div>
                </div>
            </div>
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="row">
        @foreach($department_list as $item)
            <div class="col-md-3">
                <div class="card card-success collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Department: <b>{{$item->name}}</b></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Total Recruit <span class="float-right badge bg-danger">31</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Total CV <span class="float-right badge bg-danger">5</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (New) <span class="float-right badge bg-danger">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Internship) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Send Result) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Offer) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Onboard) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Reject) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Curriculum Vitae (Working) <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @endforeach
    </div>

    @foreach($recruit_list as $i)
        {{ $i -> title }} - {{$i ->department -> name}}<br>
    @endforeach

@endsection
@push('js')
    <script>
        $(function () {
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

            {{--// Khởi tạo Array để lưu các name--}}
            {{--var departName = [];--}}
            {{--@foreach($recruit_chart_open as $item)--}}
            {{--    departName.push('{{ $item }}')--}}
            {{--@endforeach--}}

                var donutData = {
                labels: [
                    'Recruit Open',
                    'Recruit Close',
                    'Curriculum Vitae (New)',
                    'Curriculum Vitae (Internship)',
                    'Curriculum Vitae (Offer)',
                    'Curriculum Vitae (Onboard)',
                ],
                datasets: [
                    {
                        data: [
                            300,
                            500,
                            400,
                            600,
                            300,
                            100
                        ],
                        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }
                ]
            }
            var donutOptions = {
                maintainAspectRatio : false,
                responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
        })
    </script>



{{--    <script>--}}
    {{--    $(document).ready(function () {--}}
    {{--        // Create DataTable--}}
    {{--        var table = $('#table-dashboard').DataTable({--}}
    {{--            responsive: true--}}
    {{--        });--}}

    {{--        // Create the chart with initial data--}}
    {{--        var container = $('<div/>').insertBefore(table.table().container());--}}

    {{--        var chart = Highcharts.chart(container[0], {--}}
    {{--            chart: {--}}
    {{--                type: 'pie',--}}
    {{--            },--}}
    {{--            title: {--}}
    {{--                text: 'Human Resource Management System FPT',--}}
    {{--            },--}}
    {{--            series: [--}}
    {{--                {--}}
    {{--                    data: chartData(table),--}}
    {{--                },--}}
    {{--            ],--}}
    {{--        });--}}

    {{--        // On each draw, update the data in the chart--}}
    {{--        table.on('draw', function () {--}}
    {{--            chart.series[0].setData(chartData(table));--}}
    {{--        });--}}
    {{--    });--}}

    {{--    function chartData(table) {--}}
    {{--        var counts = {};--}}

    {{--        // Count the number of entries for each position--}}
    {{--        table--}}
    {{--            .column(2, { search: 'applied' })--}}
    {{--            .data()--}}
    {{--            .each(function (val) {--}}
    {{--                if (counts[val]) {--}}
    {{--                    counts[val] += 1;--}}
    {{--                } else {--}}
    {{--                    counts[val] = 1;--}}
    {{--                }--}}
    {{--            });--}}

    {{--        // And map it to the format highcharts uses--}}
    {{--        return $.map(counts, function (val, key) {--}}
    {{--            return {--}}
    {{--                name: key,--}}
    {{--                y: val,--}}
    {{--            };--}}
    {{--        });--}}
    {{--    }--}}
    {{--</script>--}}
@endpush
