@extends('home')
@section('content')

    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Account</h3>
            </div>
            <!-- form start -->
            <form method="POST" action="/users/{{$detail->id}}">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $detail->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $detail -> email }}">
                    </div>

                    <div class="form-group" data-select2-id="78">
                        <label>Department</label>
                        <select name="department_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                            @foreach($department as $item)
                                <option selected="selected" value="{{ $item -> id }}">{{$item -> name}}</option>
                            @endforeach
                        </select>
                    </div>

{{--                                        <div class="form-group" data-select2-id="78">--}}
{{--                                            <label>Role</label>--}}
{{--                                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">--}}
{{--                                                <option selected="selected" data-select2-id="19">Role Select</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>


@endsection
