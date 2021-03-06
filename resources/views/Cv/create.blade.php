@extends('home')
@section('content')
    <style>
        b{
            color: red;
            font-size: 12px;
        }
    </style>
    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px; color: white">Add Curriculum Vitae</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data" id="frmCV">
                    @csrf
                    <div class="form-group" data-select2-id="74">
                        <i class="fa-solid fa-location-arrow"></i>
                        <label>Add to <b>(Required)</b></label>
                        <select name="recruit_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                            @foreach($recruit_list as $item)
                                <option selected="selected" value="{{ $item -> id }}">{{ $item -> title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Full Name <b>(Required)</b>
                        </label>
                        <input type="text" class="form-control success" name="name" id="inputSuccess" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Phone Number <b>(Required)</b>
                        </label>
                        <input type="text" class="form-control success" name="phone" minlength="10" maxlength="12" pattern="[0][0-9]{9}" id="inputSuccess" placeholder="Ex: 0399769450">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-at"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Email <b>(Required)</b>
                        </label>
                        <input type="email" class="form-control success" name="email" id="inputSuccess" placeholder="abcd@gmail.com">
                    </div>

                    <div class="col-sm-6">
                        <i class="fa-solid fa-mars-and-venus"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Gender
                        </label>
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="gender" value="0" id="radioSuccess1">
                                <label for="radioSuccess1">Male</label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="gender" value="1" id="radioSuccess3">
                                <label for="radioSuccess3">Female</label>
                            </div><br>
                            <div class="icheck-warning d-inline">
                                <input type="radio" name="gender" value="2" id="radioSuccess4">
                                <label for="radioSuccess4">Other</label>
                            </div><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-location-dot"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Address <b>(Required)</b>
                        </label>
                        <input type="text" class="form-control success" name="address" id="inputSuccess" placeholder="Address"></div>

                    <div class="form-group">
                        <i class="fa-solid fa-file-circle-check"></i>
                        <label class="col-form-label" for="inputSuccess">
                            File <b>(Required)</b>
                        </label>
                        <input type="file" class="form-control success" name="file" id="inputSuccess" placeholder="File">
                    </div>
{{--                    <div class="col-sm-6">--}}

{{--                        <div class="form-group clearfix">--}}
{{--                            <div class="icheck-success d-inline">--}}
{{--                                <input type="radio" name="gender" value="0" id="radioSuccess5">--}}
{{--                                <label for="radioSuccess5">ON</label>--}}
{{--                            </div><br>--}}
{{--                            <div class="icheck-danger d-inline">--}}
{{--                                <input type="radio" name="gender" value="1" id="radioSuccess6">--}}
{{--                                <label for="radioSuccess6">OFF</label>--}}
{{--                            </div><br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"style="color: white">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

