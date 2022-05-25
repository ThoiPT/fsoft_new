@extends('home')
@section('content')
    @include('report')
    <style>
        #example1_paginate{
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">View Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-dashboard" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Status</th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Recruit Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vacancy Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Close Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Slot</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recruit_list as $item)
                                <tr class="odd">
                                    <td class="dtr-control" tabindex="0">{{ $item -> id }}</td>
                                    <td>
                                        <small class="badge badge-success">
                                            <i class="fa flag-icon-er"></i>Request Open
                                        </small>
                                    </td>
                                    <td>{{ $item -> title }}</td>
                                    <td>{{ $item -> vacancy -> name ?? 'None' }}</td>
                                    <td>{{ $item -> close_at }}</td>
                                    @if($item -> numRecruit <= 0)
                                        <td>
                                            <small class="badge badge-danger">Full Slot</small>
                                        </td>
                                    @else
                                        <td>
                                            <small class="badge badge-info">Available: {{$item->numRecruit}} </small>
                                        </td>
                                    @endif
                                    <td>{{ $item -> department -> name ?? 'None'}}</td>
                                    <td>{{ $item -> user -> email ?? 'None' }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Recruit Name</th>
                                    <th rowspan="1" colspan="1">Vacancy Name</th>
                                    <th rowspan="1" colspan="1">Close Date</th>
                                    <th rowspan="1" colspan="1">Vacancy</th>
                                    <th rowspan="1" colspan="1">Department</th>
                                    <th rowspan="1" colspan="1">Email</th>
{{--                                    <th rowspan="1" colspan="1">Action</th>--}}
                                </tr>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <script>
        $(document).ready( function () {
            $('#table-dashboard').DataTable();
        } );
    </script>
@endsection

