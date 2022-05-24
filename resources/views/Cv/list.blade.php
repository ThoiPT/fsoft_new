@extends('home')
@section('content')
    <style>
        #example1_paginate{
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Curriculum Vitae</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Status</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Full Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Phone Number</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">File CV</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr class="odd">
                                    <td class="dtr-control" tabindex="0"></td>
                                    <td>
                                        <small class="badge badge-info">Interview</small>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        Đang test
{{--                                        <a href={{ asset('/uploads/'.$item->file) }} target="_blank">{{ $item -> file }}</a>--}}
{{--                                        <embed name="plugin" src={{ asset('/uploads/'.$item->file) }} type="application/pdf">--}}
                                    </td>
                                    <td>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/cv/create">New</a>
                                                {{-- <a class="dropdown-item" href="/cv/update/{{$item -> id}}">Update</a> --}}
                                                {{-- <a class="dropdown-item" onclick="deleteConfirm({{$item -> id}})">Delete</a> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Title</th>
                                <th rowspan="1" colspan="1">Full Name</th>
                                <th rowspan="1" colspan="1">Phone Number</th>
                                <th rowspan="1" colspan="1">Address</th>
                                <th rowspan="1" colspan="1">File CV</th>
                                <th rowspan="1" colspan="1">Action</th>
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
        function deleteConfirm(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/cv/delete/" + id
                }
            })
        }
    </script>
@endsection





