@extends('home')
@section('content')
<style>
    #example1_paginate {
        display: none;
    }
</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Request</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                    Description

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                    Email

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
                                <td class="text-center">
                                    @if($item->status === App\Enums\Status::On)
                                    <i class="fs-2 fa fa-toggle-on"></i>
                                    @else
                                    <i class="fs-2 fa fa-toggle-off"></i>
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->vacancy->name." - ". $item->level }}</td>
                                <td>{{ $item->description }}</td>
                                <td>123</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/recruits/edit">Edit</a>
                                            <a class="dropdown-item" href="javascript:;" onClick='deleteConfirm({{$item->id}})'>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
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
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/recruits/" + id,
                }).done(function(res) {
                    if (res.status == 'success') {
                        Swal.fire(
                            'Delete!',
                            'Đã xóa thành công',
                            'success'
                        ).then(c => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Delete!',
                            'Xóa thất bại',
                            'error'
                        )
                    }
                });
            }
        })
    }
</script>
@endsection
