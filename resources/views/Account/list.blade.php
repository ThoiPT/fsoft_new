@extends('home')
@section('content')
    <style>
        #example1_paginate{
            display: none;
        }

    </style>
    <!-- TABLE USER -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" style="font-weight: bold">List of Account (Employee)</a>
            <a href="/users/create" class="btn btn-outline-danger" style="font-weight: bold; float: right">New Account</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- SHOW LIST ACCOUNT ADMIN -->

                        <table id="table-account" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Full Name</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Email</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($list_user as $item)
                                <tr class="odd">
                                    <td>{{ $item -> id }}</td>
                                    <td>{{ $item -> role }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> email }}</td>
                                    <td>{{ $item -> department-> name ?? 'None'}}</td>
                                    <td>{{ $item -> created_at }}</td>
                                    <td>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="/users/{{$item -> id}}/edit">Edit</a>
                                                 <a class="dropdown-item" onclick="deleteConfirm({{$item -> id}})">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">Role</th>
                                <th rowspan="1" colspan="1">Full Name</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Department</th>
                                <th rowspan="1" colspan="1">Created At</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- SHOW LIST ACCOUNT ADMIN -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- TABLE ADMIN -->
    <div class="card">
        <div class="card-header">
            <h3 class="btn btn-success" style="font-weight: bold">List of Account (Admin)</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- SHOW LIST ACCOUNT ADMIN -->
                        <table id="table-account-admin" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Full Name</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Email</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($list_admin as $item)
                                <tr class="odd">
                                    <td>{{ $item -> id }}</td>
                                    <td>{{ $item -> role }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> email }}</td>
                                    <td>{{ $item -> department-> name ?? 'None'}}</td>
                                    <td>{{ $item -> created_at }}</td>
                                    <td>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/users/{{$item -> id}}/edit">Edit</a>
                                                <a class="dropdown-item" onclick="deleteConfirm({{$item -> id}})">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">Role</th>
                                <th rowspan="1" colspan="1">Full Name</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Department</th>
                                <th rowspan="1" colspan="1">Created At</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- SHOW LIST ACCOUNT ADMIN -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <script>
        function deleteConfirm(id) {
            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE"
                        , url: "/users/" + id
                        , }).done(function(res) {
                        if (res.status == 'success') {
                            Swal.fire(
                                'Delete!'
                                , 'Delete Success'
                                , 'success'
                            ).then(c => {
                                window.location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Delete!'
                                , 'Delete Failed'
                                , 'error'
                            )
                        }
                    });
                }
            })
        }
    </script>
    <!-- SEARCH DATA TABLE USER-->
    <script>
        $(document).ready(function () {
            $('#table-account').DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                initComplete: function () {
                    this.api()
                        .columns([2,3,4,5])
                        .every(function () {
                            var column = this;
                            var select = $('<select class="form-select form-select-sm"><option value=""></option></select>')
                                .appendTo($(column.header()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
                            column.data().unique().sort().each( function ( d, j ) {
                                if(column.search() === '^'+d+'$'){
                                    select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                                } else {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                }
                            } );
                        });
                },
            });
        });
    </script>
    <!-- SEARCH DATA TABLE ADMIN -->
    <script>
        $(document).ready(function () {
            $('#table-account-admin').DataTable({
                initComplete: function () {
                    this.api()
                        .columns([2,3,4,5])
                        .every(function () {
                            var column = this;
                            var select = $('<select class="form-select form-select-sm"><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
                            column.data().unique().sort().each( function ( d, j ) {
                                if(column.search() === '^'+d+'$'){
                                    select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                                } else {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                }
                            } );
                        });
                },
            });
        });
    </script>
@endsection
