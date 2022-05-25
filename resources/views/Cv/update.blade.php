@extends('home')
@section('content')
    <div class="col-md-12" style="max-width: 100%">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title" style="color: white; font-weight: bold">Update Curriculum Vitae</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/cv/{{$detail -> id}}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Add to</label>
                        <select name="recruit_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                            @foreach($recruit_list as $item)
                                <option  selected="selected" value="{{$item -> id}}">{{$item -> title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Full Name
                        </label>
                        <input  type="text" class="form-control success" name="name" id="inputSuccess" value="{{ $detail -> name }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Phone Number
                        </label>
                        <input type="text" class="form-control success" name="phone" id="inputSuccess"value="{{ $detail -> phone }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Email
                        </label>
                        <input type="email" class="form-control success" name="email" id="inputSuccess"value="{{ $detail -> email }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Address
                        </label>
                        <input type="text" class="form-control success" name="address" id="inputSuccess" value="{{ $detail -> address }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            File
                        </label>
                        <input  type="text" class="form-control success" name="file" id="inputSuccess" value="{{ $detail -> file }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            File
                        </label>
                        <input required type="file" class="form-control success" name="file" id="inputSuccess" placeholder="File">
                    </div>

                    <div class="col-sm-6">
                        <label class="col-form-label" for="inputSuccess">Status</label>
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" value="{{ \App\Enums\Status::Interview }}" id="radioSuccess1">
                                <label for="radioSuccess1">
                                    Interview
                                </label>
                            </div><br>
                            <div class="icheck-info d-inline">
                                <input type="radio" name="status" value="{{ \App\Enums\Status::Offer }}" id="radioSuccess3">
                                <label for="radioSuccess3">
                                    Offer
                                </label>
                            </div><br>
                            <div class="icheck-warning d-inline">
                                <input type="radio" name="status" value="{{ \App\Enums\Status::Onboard }}" id="radioSuccess4">
                                <label for="radioSuccess4">
                                    Onboard
                                </label>
                            </div><br>
                        </div>
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

