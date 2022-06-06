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
            <h1 class="card-title" style="font-size: 25px">
                <i class="fa-solid fa-chart-pie"></i>
                    Human Resource Management
            </h1>
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
                        <h3 class="card-title">
                            <i class="fa-solid fa-users-cog"></i>
                                Department: <b>{{$item->name}}</b></h3>
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
                                <a href="/report/total_recruit/{{$item->id}}/{{$item->name}}" class="nav-link">
                                    Total Recruit <span class="float-right badge bg-danger">{{ $item->quantityRecruit() }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/report/total_cv/{{$item->id}}/{{$item->name}}" class="nav-link">
                                    Total CV <span class="float-right badge bg-danger">{{ $item->cv->count('id') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/report/total_new/{{$item->id}}/{{$item->name}}" class="nav-link">
                                    Curriculum Vitae (New) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::New)->count('id') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('total_interview') }}" class="nav-link">
                                    Curriculum Vitae (Interview) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::Interview)->count('id') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Curriculum Vitae (Send Result) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::SendResult)->count('id') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Curriculum Vitae (Offer) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::Offer)->count('id') }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Curriculum Vitae (Onboard) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::Onboard)->count('id') }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Curriculum Vitae (Reject) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::Reject)->count('id') }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Curriculum Vitae (Working) <span class="float-right badge bg-danger">{{ $item->cv->where('status', \App\Enums\Status::working)->count('id') }}</span>
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
@endsection
@push('js')
    <script>
        $(function () {
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            {{--// Khởi tạo Array để lưu các name--}}
            {{--var departName = [];--}}
            {{--@foreach($recruit_chart_open as $item)--}}
            {{--    departName.push('{{ $item -> title }}')--}}
            {{--@endforeach--}}
                var donutData = {
                labels: [
                    'Recruit Open',
                    'Recruit Close',
                    'Curriculum Vitae (New)',
                    'Curriculum Vitae (Interview)',
                    'Curriculum Vitae (Offer)',
                    'Curriculum Vitae (Onboard)',
                ],
                datasets: [
                    {
                        data: [
                            @foreach($recruit_chart_open as $item) {{ $item }} @endforeach,
                            @foreach($recruit_chart_close as $item) {{ $item }} @endforeach,
                            @foreach($cv_new as $item) {{ $item }} @endforeach,
                            @foreach($cv_interview as $item) {{ $item }} @endforeach,
                            @foreach($cv_offer as $item) {{ $item }} @endforeach,
                            @foreach($cv_onboard as $item) {{ $item }} @endforeach,
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
                type: 'pie',
                data: donutData,
                options: donutOptions
            })
        })
    </script>
@endpush
