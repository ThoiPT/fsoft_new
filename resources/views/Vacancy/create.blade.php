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

            <form action="{{ route('vacancies.store') }}" method="POST" novalidate="novalidate">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vacancy Name</label>
                        <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor"></textarea>
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


