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
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px">New Vacancy Name</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('vacancies.store') }}" method="POST" novalidate="novalidate" id="frmVacancy">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <i class="fa-solid fa-inbox"></i>
                        <label for="exampleInputEmail1"> Vacancy Name <b>(Required)</b></label>
                        <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" pattern="[^0-9]*" title="First name cannot contains any digits, Please enter at least 3 characters.">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-inbox"></i>
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


