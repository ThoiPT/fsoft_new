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
                <a class="btn btn-group-toggle" style="color: white;font-weight: bold; font-size: 23px">
                    Edit Curriculum Vitae: {{ $detail->name }}
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/cv/{{$detail -> id}}" method="POST" enctype="multipart/form-data" id = "frmCV_Edit" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <i class="fa-solid fa-location-arrow"></i>
                        <label>Add to <b>(Required)</b></label>
                        <select name="recruit_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                            @foreach($recruit_list as $item)
                                <option selected="selected" value="{{$item -> id}}">{{$item -> title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Full Name <b>(Not Empty)</b>
                        </label>
                        <input  type="text" class="form-control success" name="name" id="inputSuccess" value="{{ $detail -> name }}">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Phone Number <b>(Not Empty)</b>
                        </label>
                        <input type="text" class="form-control success" name="phone" id="inputSuccess"value="{{ $detail -> phone }}">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-at"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Email <b>(Not Empty)</b>
                        </label>
                        <input type="email" class="form-control success" name="email" id="inputSuccess"value="{{ $detail -> email }}">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-location-dot"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Address <b>(Not Empty)</b>
                        </label>
                        <input type="text" class="form-control success" name="address" id="inputSuccess" value="{{ $detail -> address }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            File Review
                        </label>
                    </div>
{{--                    <iframe src="storage/{{$detail->file }}" class="embed-responsive-item"></iframe>--}}
                    <iframe src={{ asset('storage/'.$detail->file) }} class="embed-responsive-item"></iframe>
{{--                    <iframe src="storage/5XfshAm7OpSwlhgnAmjZif4aDzkezUciaO585Q75.pdf" class="embed-responsive-item"></iframe>--}}
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            File change <b><i>(Option Not Required)</i></b>
                        </label>
                        <input type="file" value="{{ $detail -> file }}" class="form-control success" name="file" id="inputSuccess" placeholder="File">
                    </div>

                    <div class="col-sm-6">
                        <label class="col-form-label" for="inputSuccess">Status</label>
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::Interview) checked="" @endif
                                value="{{ \App\Enums\Status::Interview }}" id="radioSuccess1">
                                <label for="radioSuccess1">Interview</label>
                            </div><br>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::SendResult) checked="" @endif
                                value="{{ \App\Enums\Status::SendResult }}" id="radioSuccess5">
                                <label for="radioSuccess5">Send Result</label>
                            </div><br>
                            <div class="icheck-info d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::Offer) checked="" @endif
                                value="{{ \App\Enums\Status::Offer }}" id="radioSuccess3">
                                <label for="radioSuccess3">Offer</label>
                            </div><br>
                            <div class="icheck-secondary d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::Reject) checked="" @endif
                                value="{{ \App\Enums\Status::Reject }}" id="radioSuccess6">
                                <label for="radioSuccess6">Reject</label>
                            </div><br>
                            <div class="icheck-warning d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::Onboard) checked="" @endif
                                value="{{ \App\Enums\Status::Onboard }}" id="radioSuccess4">
                                <label for="radioSuccess4">Onboard</label>
                            </div><br>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::working) checked="" @endif
                                    value="{{ \App\Enums\Status::working }}" id="radioSuccess7">
                                <label for="radioSuccess7">Working</label>
                            </div><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"style="color: white">Confirm</button>
                        <a href="{{ route('cv.index') }}" class="btn btn-secondary"style="color: white">Back</a>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

