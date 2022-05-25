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
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">New Account</a>
            </div>
            <!-- form start -->
            <form method="POST" action="{{ route('users.store') }}" id="frmAccount">
                @csrf
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <h4>Please provide account information</h4>
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <label for="exampleInputName"> Full Name <b>(Required)</b></label>
                        <input type="text" class="form-control" id="exampleInputName" minlength="7" name="name" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-at"></i>
                        <label for="exampleInputEmail1"> Email address <b>(Required)</b></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-key"></i>
                        <label for="exampleInputPassword1">Password <b>(Required)</b></label>
                        <input type="password" class="form-control" id="password"  name="password" placeholder="Password" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-users-cog"></i>
                        <label> Department <b>(Required)</b></label>
                        <select required name="department_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            @foreach($department as $item)
                                <option selected="selected" value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Role <b>(Required)</b></label>
                        <select required name="role" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                                <option value="{{ \App\Enums\UserRole::Admin }}">Admin</option>
                                <option value="{{ \App\Enums\UserRole::Employee }}">Employee</option>
                        </select>
                    </div>
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
