@extends('home')
@section('content')
    <style>
        #example1_paginate {
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-danger" style="font-weight: bold">List of Curriculum Vitae </a> <a class="btn btn-success" style="font-weight: bold">All</a>
            <a href= "{{ route('cv.create') }}" class="btn btn-outline-danger" style="font-weight: bold; float: right">New CV</a>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Department</th>
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
                                    @elseif($item -> status == \App\Enums\Status::SendResult)
                                        <td>
                                            <small class="badge badge-info">Send Result</small>
                                        </td>
                                    @elseif($item -> status == \App\Enums\Status::Offer)
                                        <td>
                                            <small class="badge badge-primary">Offer</small>
                                        </td>
                                    @elseif($item -> status == \App\Enums\Status::Reject)
                                        <td>
                                            <small class="badge badge-secondary">Reject</small>
                                        </td>
                                    @elseif($item -> status == \App\Enums\Status::Onboard)
                                        <td>
                                            <small class="badge badge-info">Onboard</small>
                                        </td>
                                    @else
                                        <td>
                                            <small class="badge badge-danger">Working</small>
                                        </td>
                                    @endif
                                    <td> {{ $item -> recruit -> department -> name ?? 'None' }}</td>
                                    <td>{{ $item -> recruit -> title ?? 'None' }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> phone }}</td>
                                    <td>{{ $item -> address }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href={{ asset('storage/'.$item->file) }}>Download File</a>
                                        {{--                                    <iframe src="{{ asset('storage/'.$item->file) }}" class="embed-responsive-item"></iframe>--}}
                                        {{--                                    <iframe src="{{\Illuminate\Support\Facades\Storage::url($item->file) }}"></iframe>--}}
                                    </td>
                                    <td>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/cv/{{$item -> id}}/edit">Edit</a>
                                                <a class="dropdown-item" href="javascript:;" onclick="deleteConfirm({{$item -> id}})">Delete</a>
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
                                <th rowspan="1" colspan="1">Department</th>
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
