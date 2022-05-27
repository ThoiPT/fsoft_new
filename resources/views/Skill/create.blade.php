@extends('home')
@section('content')
    <style>
        b{
            color: red;
            font-size: 12px;
        }
    </style>
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
        <div class="card-header">
            <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">New Skill</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="frmSkill" action="{{ route('skills.store') }}" method="POST" novalidate="novalidate">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <i class="fa-solid fa-spell-check"></i>
                    <label for="exampleInputEmail1">Skill Name <b> (Required)</b></label>
                    <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" value="1" id="radioSuccess1">
                                <label for="radioSuccess1">ON</label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" value="0" id="radioSuccess3">
                                <label for="radioSuccess3">OFF</label>
                            </div><br>
                        </div>
                     </div>
            <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection


