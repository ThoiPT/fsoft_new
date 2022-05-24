@extends('home')
@section('content')
    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">ADD Curriculum Vitae</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" id="frmCV">
                    @csrf
                    {{--notification--}}
                    {{-- @if(\Illuminate\Support\Facades\Session::has('mes'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i>
                                {{ \Illuminate\Support\Facades\Session::get('mes') }}
                            </h5>
                            Continue add or
                            <a style="font-weight: bold; color: floralwhite" href="{{ route('get.cv.list') }}">
                                Go to List of Curriculum Vitae
                            </a>
                        </div>
                    @endif --}}

                    <div class="form-group" data-select2-id="74">
                        <label>Add to</label>
                        <select name="request_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">

                                <option selected="selected" value="">

                                </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Full Name
                        </label>
                        <input type="text" class="form-control success" name="name" id="inputSuccess" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Phone Number
                        </label>
                        <input type="text" class="form-control success" name="phone" minlength="10" maxlength="12" pattern="[0][0-9]{9}" id="inputSuccess" placeholder="Ex: 0399769450">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Email
                        </label>
                        <input type="email" class="form-control success" name="email" id="inputSuccess" placeholder="abcd@gmail.com">
                    </div>

                    <div hidden class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Gender
                        </label>
                        <input type="ra" class="form-control success" name="status" id="inputSuccess" value="0">
                    </div>


                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Address
                        </label>
                        <input type="text" class="form-control success" name="address" id="inputSuccess" placeholder="Address"></div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            File
                        </label>
                        <input type="file" class="form-control success" name="file" id="inputSuccess" placeholder="File">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"style="color: white">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

