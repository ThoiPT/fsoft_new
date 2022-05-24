@extends('home')
@section('content')
    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Department</h3>
            </div>
            <!-- form start -->

            <form action="" method="POST" id="frmDepartment">
                @csrf
                {{-- @if(\Illuminate\Support\Facades\Session::has('mes'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i>
                            {{ \Illuminate\Support\Facades\Session::get('mes') }}
                        </h5>
                        Continue add or
                        <a style="font-weight: bold; color: floralwhite" href="{{ route('get.department.list') }}">
                            Go to List of Department
                        </a>
                    </div>
                @endif --}}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputSkill" placeholder="Enter name">
                        {{-- <span style="color: red">@error('name')* {{$message}}@enderror</span> --}}
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor"></textarea>
                        {{-- <span style="color: red">@error('description')* {{$message}}@enderror</span> --}}
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary ">Add</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection


