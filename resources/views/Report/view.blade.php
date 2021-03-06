@extends('home')
@section('content')
    @include('report')
    {{--    <style>--}}
    {{--        #example1_paginate{--}}
    {{--            display: none;--}}
    {{--        }--}}
    {{--        #test {--}}
    {{--            pointer-events: none;--}}
    {{--            font-size: 23px;--}}
    {{--            font-weight: bold;--}}
    {{--            color: white;--}}
    {{--        }--}}
    {{--    </style>--}}
    {{--    <div class="card">--}}
    {{--        <div class="card-header">--}}
    {{--            <a id="test" class="btn btn-warning">All Recruit (Open)</a>--}}
    {{--        </div>--}}
    {{--        <!-- /.card-header -->--}}
    {{--        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-sm-12">--}}
    {{--                        <form method="GET" action="{{ route('dashboard') }}" id="search">--}}
    {{--                            From: <input type="date" name="start_date">--}}
    {{--                            To <input type="date" name="end_date">--}}
    {{--                            Department--}}
    {{--                            <select name="department_name">--}}
    {{--                                <option disabled selected="">Choose Department</option>--}}
    {{--                                @foreach($department_list as $item)--}}
    {{--                                    <option value="{{ $item -> id }}">{{ $item -> name }}</option>--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}
    {{--                            <button type="submit"> Search </button>--}}
    {{--                        </form>--}}
    {{--                        <table id="table-dashboard" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">--}}
    {{--                            <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">--}}
    {{--                                        Status--}}
    {{--                                    </th>--}}
    {{--                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Recruit Name</th>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vacancy Name</th>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Close Date</th>--}}

    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Slot</th>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>--}}
    {{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>--}}
    {{--                                </tr>--}}
    {{--                            </thead>--}}
    {{--                            <tbody>--}}
    {{--                                @foreach($recruit_list as $item)--}}
    {{--                                <tr class="odd">--}}
    {{--                                    <td class="dtr-control" tabindex="0">{{ $item -> id }}</td>--}}
    {{--                                    <td>--}}
    {{--                                        <small class="badge badge-success">--}}
    {{--                                            <i class="fa flag-icon-er"></i>Request Open--}}
    {{--                                        </small>--}}
    {{--                                    </td>--}}
    {{--                                    <td>{{ $item -> title }}</td>--}}
    {{--                                    <td>{{ $item -> vacancy -> name ?? 'None' }}</td>--}}

    {{--                                    <td>{{ $item -> close_at }}</td>--}}
    {{--                                    @if($item -> numRecruit <= 0)--}}
    {{--                                        <td>--}}
    {{--                                            <small class="badge badge-danger">Full Slot</small>--}}
    {{--                                        </td>--}}
    {{--                                    @else--}}
    {{--                                        <td>--}}
    {{--                                            <small class="badge badge-info">Available: {{$item->numRecruit}} </small>--}}
    {{--                                        </td>--}}
    {{--                                    @endif--}}
    {{--                                    <td> {{ $item -> department -> name ?? 'None'}}</td>--}}
    {{--                                    <td>{{ $item -> user -> email ?? 'None' }}</td>--}}
    {{--                                </tr>--}}
    {{--                                @endforeach--}}
    {{--                            </tbody>--}}
    {{--                            <tfoot>--}}
    {{--                                <tr>--}}
    {{--                                    <th rowspan="1" colspan="1">ID</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Status</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Recruit Name</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Vacancy Name</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Close Date</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Vacancy</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Department</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Email</th>--}}
    {{--                                    <th rowspan="1" colspan="1">Action</th>--}}
    {{--                                </tr>--}}
    {{--                            </tfoot>--}}
    {{--                        </table>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <style>
        #example1_paginate {
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-danger" style="font-weight: bold">View Report</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="GET" action="{{ route('report') }}" id="frmSearch">
                            <div class="row">
                                <div class="col">
                                    <label>From</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                                <div class="col">
                                    <label>To</label>
                                    <input type="date" name="end_date"  class="form-control">
                                </div>
                                <div class="col">
                                    <label>Department</label>
                                    <select class="form-select" name="department_name">
                                        <option value="all">All Department</option>
                                        @foreach($department_list as $item)
                                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"></div>
                                    <div class="col">
                                        <a style="font-weight: bold; color: white" class="btn btn-warning float-end" href="{{ route('export') }}">Export User Data</a>
                                    </div>
                                <button style="max-width: 31%; margin: 0px 13px" class="btn btn-primary" type="submit"> Search </button>
                            </div>
                            <br>

{{--                            <div class="alert alert-success" role="alert" id="timeReport">--}}
{{--                                Time report From: <a id="fromDate">--}}
{{--                                    @if( $from == null )--}}
{{--                                        ALL--}}
{{--                                    @else--}}
{{--                                        {{ $from }}--}}
{{--                                    @endif--}}
{{--                                </a> To: <a id="toDate">--}}
{{--                                    @if( $to == null )--}}
{{--                                        ALL--}}
{{--                                    @else--}}
{{--                                        {{ $to }}--}}
{{--                                    @endif--}}
{{--                                </a>--}}
{{--                            </div>--}}

                        </form>
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending">Recruit</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Curriculum Vitae</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Interview</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Offer</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Onboard</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Reject</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Working</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($department_list as $item)
                                @if( $check_department == "department_$item->id" || $check_department == false)
                                <tr class="odd" id="department_{{ $item->id }}">
                                    <td> {{ $item -> name }}</td>
                                    <td>{{ $item -> recruit_total }}</td>
                                    <td>{{ $item -> cv_total }}</td>
                                    <td>{{ $item -> cv_interview }}</td>
                                    <td>{{$item->cv_offer}}</td>
                                    <td>{{ $item->cv_onboard }}</td>
                                    <td>{{ $item -> cv_reject }}</td>
                                    <td>{{ $item -> cv_working }}</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {

            $('#frmSearch').on('submit', function (e){
                e.preventDefault();
                const table = $('#example1');
                $.ajax({
                    method: "GET",
                    url: $(this).attr('action'),
                    data: $(this).serialize()
                }).done(function (response) {
                    const html = $(response).find('#example1').html();
                    table.html(html);
                })
            })
        });
    </script>
@endpush
