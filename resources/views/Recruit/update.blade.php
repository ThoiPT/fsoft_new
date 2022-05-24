@extends('home')
@section('content')
<div class="row justify-content-center">

    <div class="col-md-6" style="max-width: 100%">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">UPDATE REQUEST</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/recruits/{{ $detail->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Alert!</h5>
                        Vui lòng kiểm tra Skill - Job trước khi nhấn Update
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Request Title
                        </label>
                        <input type="text" class="form-control success" name="title" id="inputSuccess" value="{{ $detail -> title }}" placeholder="Request Title">
                    </div>

                    <div class="form-group" data-select2-id="74">
                        <label>Select Skill</label>
                        <select name="vacancy_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%">
                            @foreach($vacancy_list as $item)
                            <option @if($detail->vacancy_id == $item->id) selected="selected" @endif value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" data-select2-id="120">
                        <label>Other Skill</label>
                        <div class="select2-purple" data-select2-id="119">
                            <select name="skills[]" class="select2 select2-hidden-accessible" multiple data-placeholder="Select other skill" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-hidden="true">

                                @foreach($skill_list as $item)
                                    @php
                                        $check = false;
                                    @endphp
                                    @foreach($detail->skills as $v)
                                        @php
                                        if($item->id == $v->id){
                                            $check = true;
                                        }
                                        @endphp
                                    @endforeach
                                    <option @if($check) selected @endif value="{{$item -> id}}">{{$item->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Experience
                        </label>
                        <input value="{{ $detail -> exp }}" type="text" class="form-control success" name="exp" id="inputSuccess" placeholder="Request Title">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Slot Recruits
                        </label>
                        <input value="{{ $detail -> numRecruit }}" type="number" class="form-control success" name="numRecruit" id="inputSuccess" placeholder="Request Title">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Level
                        </label>
                        <input value="{{ $detail -> level }}" type="text" class="form-control success" name="level" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Open Date
                        </label>
                        <input value="{{ $detail->open_at }}" type="date" class="form-control success" name="open_at" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Close Date
                        </label>
                        <input value="{{ $detail->close_at }}" type="date" class="form-control success" name="close_at" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor"> {!! $detail -> description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Status (1:ON - 2:OFF)
                        </label>
                        <input value="{{ $detail -> status }}" type="number" class="form-control success" name="status" id="inputSuccess" placeholder="0:OFF - 1:ON">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail -> status == 1) checked="" @endif value="1" id="radioSuccess1">
                                <label for="radioSuccess1">
                                    ON
                                </label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" @if($detail -> status == 0) checked="" @endif value="0" id="radioSuccess3">
                                <label for="radioSuccess3">
                                    OFF
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="color: white">UPDATE</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
