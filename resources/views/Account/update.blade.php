@extends('home')
@section('content')
    <style>
        b{
            color: red;
            font-size: 12px;
        }
    </style>

    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">Edit Account: {{ $detail->name }} ({{ $detail -> role }})</a>
            </div>
            <!-- form start -->
            <form method="POST" action="/users/{{$detail->id}}">
                @method('PUT')
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <label for="exampleInputName"> Full Name</label>
                        <input type="text" class="form-control" id="exampleInputName" minlength="7" name="name" value="{{ $detail -> name }}">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-at"></i>
                        <label for="exampleInputEmail1"> Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $detail -> email }}">
                    </div>

                    <div class="form-group" data-select2-id="78">
                        <i class="fa-solid fa-users-cog"></i>
                        <label>Department</label>
                        <select name="department_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                            @foreach($department as $item)
                                <option @if($item->id == $detail->department_id) selected @endif value="{{ $item -> id }}">{{$item -> name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            <h5>Please !! Check Role Account</h5>
                        </div>
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Role <b>(Important)</b> </label>
                        <select required name="role" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                                <option value="{{ \App\Enums\UserRole::Admin }}">Admin</option>
                                <option value="{{ \App\Enums\UserRole::Employee }}">Employee</option>
                        </select>
                    </div>
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
