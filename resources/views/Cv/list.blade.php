@extends('home')
@section('content')
<style>
    #example1_paginate {
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
                    <table id="table-cv" class="table table-bordered table-striped dtr-inline">
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
                            @foreach($list as $item)
                            <tr class="odd" id="cv-tr-{{ $item->id }}">
                                <td class="dtr-control" tabindex="0">{{ $item -> id }}</td>
                                @if($item -> status == \App\Enums\Status::New)
                                <td>
                                    <small class="badge badge-success">New</small>
                                </td>
                                @elseif($item -> status == \App\Enums\Status::Interview)
                                <td>
                                    <small class="badge badge-warning">Interview</small>
                                </td>
                                @elseif($item -> status == \App\Enums\Status::Offer)
                                <td>
                                    <small class="badge badge-info">Offer</small>
                                </td>
                                @else
                                <td>
                                    <small class="badge badge-danger">Onboard</small>
                                </td>
                                @endif
                                <td>{{ $item -> recruit -> title ?? 'None' }}</td>
                                <td>{{ $item -> recruit -> user -> name ?? 'None' }}</td>
                                <td>{{ $item -> phone }}</td>
                                <td>{{ $item -> address }}</td>
                                <td>
                                    <a href={{ asset('storage/'.$item->file) }}>File CV</a>
                                    <!-- <iframe src={{ asset('storage/'.$item->file) }} class="embed-responsive-item"></iframe> -->
                                </td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/cv/create">New</a>
                                            <a class="dropdown-item" href="/cv/{{$item -> id}}/edit">Edit</a>
                                            <a class="dropdown-item" href="javascript:;" onclick="deleteConfirm({{$item -> id}})">Delete</a>
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

</script>
<script>
    $(document).ready( function () {
        $('#table-cv').DataTable();
    } );
</script>

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
                    url: "/cv/" + id,
                }).done(function(res) {
                    if (res.status == 'success') {
                        Swal.fire(
                            'Delete!', 'Delete Success', 'success'
                        ).then(c => {
                            const element = document.getElementById("cv-tr-" + id);
                            element.remove();
                        })
                    } else {
                        Swal.fire(
                            'Delete!', 'Delete Failed', 'error'
                        )
                    }
                });
            }
        })
    }
</script>


@endsection
