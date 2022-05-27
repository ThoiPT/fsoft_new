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
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">Edit Account: {{ $detail->name }}</a>
            </div>
            <!-- form start -->
            <form action="/skills/{{$detail -> id}}" method="POST" id="frmSkill">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <i class="fa-solid fa-spell-check"></i>
                        <label for="exampleInputEmail1"> Skill Name<b> (Not Empty)</b></label>
                        <input type="text" class="form-control" name="name" id="exampleInputSkill" value="{{ $detail -> name }}">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail->status == 1) checked="" @endif value="1" id="radioSuccess1">
                                <label for="radioSuccess1">
                                    ON
                                </label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" @if($detail->status == 0)  checked="" @endif value="0"  id="radioSuccess3">
                                <label for="radioSuccess3">
                                    OFF
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection


