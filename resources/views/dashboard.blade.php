@extends('home')
@section('content')
    @include('report')

    <style>
        #example1_paginate {
            display: none;
        }

    </style>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-danger" style="font-weight: bold">Dashboard</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-dashboard" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Recruit Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vacancy Name</th>

                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Level</th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Experience</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Slot</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recruit_list as $item)
                                <tr class="odd">
                                    <td> {{ $item -> department -> name ?? 'None'}}</td>
                                    <td>{{ $item -> title }}</td>
                                    <td>{{ $item -> vacancy -> name ?? 'None' }}</td>
                                    <td>{{ $item -> level }}</td>
                                    <td>{{ $item -> exp }}</td>
                                    @if($item -> numRecruit <= 0)
                                        <td>
                                            <small class="badge badge-danger">Full Slot</small>
                                        </td>
                                    @else
                                        <td>
                                            <small class="badge badge-info">Available: {{$item->numRecruit}} </small>
                                        </td>
                                    @endif
                                    <td>{{ $item -> user -> email ?? 'None' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Department</th>
                                    <th rowspan="1" colspan="1">Recruit Name</th>
                                    <th rowspan="1" colspan="1">Vacancy Name</th>
                                    <th rowspan="1" colspan="1">Total Recruit</th>
                                    <th rowspan="1" colspan="1">Total CV</th>
                                    <th rowspan="1" colspan="1">Vacancy</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@push('js')
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
