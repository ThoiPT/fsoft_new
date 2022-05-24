@extends('home')
@section('content')
    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Department</h3>
            </div>
            <form method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputSkill" value="{{ $department -> name }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor">{{ $department -> description }}</textarea>
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


