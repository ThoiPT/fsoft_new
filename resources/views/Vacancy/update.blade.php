@extends('home')
@section('content')

    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">Edit Vacancy Name: {{ $detail->name }}</a>
            </div>
            <!-- form start -->
            <form action="/vacancies/{{$detail->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vacancy Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputSkill" value="{{ $detail -> name }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor">{!! $detail ->description !!}</textarea>
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


