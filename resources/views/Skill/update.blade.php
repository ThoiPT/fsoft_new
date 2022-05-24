@extends('home')
@section('content')

    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Skill: {{$skills -> name}}</h3>
            </div>
            <!-- form start -->
            <form action="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Skill Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputSkill" value="{{ $skills -> name }}">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($skills->status == 1) checked="" @endif value="1" id="radioSuccess1">
                                <label for="radioSuccess1">
                                    ON
                                </label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" @if($skills->status == 0)  checked="" @endif value="0"  id="radioSuccess3">
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


