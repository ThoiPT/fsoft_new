@extends('home')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Vacancy Name</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST" novalidate="novalidate">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vacancy Name</label>
                        <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" value="1" id="radioSuccess1">
                                <label for="radioSuccess1">Open</label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" value="0" id="radioSuccess3">
                                <label for="radioSuccess3">Close</label>
                            </div><br>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    {{-- @if(\Illuminate\Support\Facades\Session::has('mes'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i>
                                {{ \Illuminate\Support\Facades\Session::get('mes') }}
                            </h5>
                            Continue add or
                            <a style="font-weight: bold; color: floralwhite" href="{{ route('get.vacancy.list') }}">
                                Go to List of Vacancy
                            </a>
                        </div>
                    @endif --}}
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection


