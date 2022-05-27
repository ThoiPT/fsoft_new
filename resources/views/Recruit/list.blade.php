@extends('home')
@section('content')
<style>
    #example1_paginate {
        display: none;
    }

</style>
<div class="card">
    <div class="card-header">
        <a class="btn btn-danger" style="font-weight: bold">List of Recruit </a>
        <a href="/recruits/create" class="btn btn-outline-danger" style="font-weight: bold; float: right">New Recruit</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="table-recruit" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">
                                    ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">
                                    Status

                                </th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">
                                    Title

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Vacancy
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Level
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Experience
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                    Description
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                    Email Log
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $list as $item )
                            <tr class="odd">
                                <td class="dtr-control" tabindex="0">{{ $item->id }}</td>
                                @if($item->status === App\Enums\Status::On)
                                    <td>
                                        <small class="badge badge-success">Recruit Open</small>
                                    </td>
                                @else
                                    <td>
                                        <small class="badge badge-danger">Recruit Close</small>
                                    </td>
                                @endif
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->vacancy->name}}</td>
                                <td>{{ $item->level}}</td>
                                <td>{{ $item->exp}}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{ $item -> user -> email ?? 'None' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/recruits/{{ $item->id }}/edit">Edit</a>
                                            <a class="dropdown-item" href="javascript:;" onclick=deleteConfirm({{ $item->id }})>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">#</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Vacancy</th>
                            <th rowspan="1" colspan="1">Level</th>
                            <th rowspan="1" colspan="1">Experience</th>
                            <th rowspan="1" colspan="1">Description</th>
                            <th rowspan="1" colspan="1">Email Log</th>
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
                    , url: "/recruits/" + id
                , }).done(function(res) {
                    if (res.status == 'success') {
                        Swal.fire(
                            'Delete!'
                            , 'Đã xóa thành công'
                            , 'success'
                        ).then(c => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Delete!'
                            , 'Xóa thất bại'
                            , 'error'
                        )
                    }
                });
            }
        })
    }
</script>
<script>
    $(document).ready(function () {
        $('#table-recruit').DataTable({
            initComplete: function () {
                this.api()
                    .columns([1,2,3,4,5,7])
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
                                select.append( '<option>'+d+'</option>' )
                            }
                        } );
                    });
            },
        });
    });
</script>
@endsection

