@extends('home')
@section('content')

    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Account</h3>
            </div>
            <!-- form start -->
            <form method="POST" action="{{ route('users.store') }}" id="frmAccount">
                @csrf
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
                        <select required name="department_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            @foreach($department as $item)
                                <option selected="selected" value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
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
