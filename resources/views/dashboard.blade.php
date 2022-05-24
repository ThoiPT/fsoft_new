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
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Status</th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Request Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Skill - Job</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Close Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vacancy</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Department</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
{{--                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>--}}
                                </tr>
                            </thead>
                            <tbody>


                                <tr class="odd">
                                    <td class="dtr-control" tabindex="0"></td>
                                    <td>
                                        <small class="badge badge-success">
                                            <i class="fa flag-icon-er"></i>Request Open
                                        </small>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <small class="badge badge-danger">Full</small>
                                    </td>
                                    <td></td>
                                    <td></td>
{{--                                    <td>--}}
{{--                                        <!-- Example single danger button -->--}}
{{--                                        <div class="btn-group">--}}
{{--                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                Action--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown-menu">--}}
{{--                                                <a class="dropdown-item" href="#">Add CV</a>--}}
{{--                                                <a class="dropdown-item" href="#">Update Status</a>--}}
{{--                                                <a class="dropdown-item" onclick="deleteConfirm({{$re->id}})">Delete</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Request Name</th>
                                    <th rowspan="1" colspan="1">Skill - Job</th>
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
@endsection

