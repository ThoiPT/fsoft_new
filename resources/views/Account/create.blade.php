@extends('home')
@section('content')

    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Account</h3>
            </div>
            <!-- form start -->
            <form method="POST" action="" id="frmAccount">
                @csrf

                {{-- @if(\Illuminate\Support\Facades\Session::has('mes'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i>
                            {{ \Illuminate\Support\Facades\Session::get('mes') }}
                        </h5>
                        Continue add or
                        <a style="font-weight: bold; color: floralwhite" href="{{ route('get.account.list') }}">
                            Go to List of Account
                        </a>
                    </div>
                @endif --}}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" minlength="5" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select required name="group_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                                <option selected="selected" value=""></option>
                        </select>
                    </div>

{{--                    <div class="form-group" data-select2-id="78">--}}
{{--                        <label>Role</label>--}}
{{--                        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">--}}
{{--                            <option selected="selected" data-select2-id="19">Role Select</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection
