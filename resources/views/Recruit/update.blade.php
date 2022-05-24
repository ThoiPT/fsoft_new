{{--@extends('home')--}}
{{--@section('content')--}}
{{--    <div class="col-md-6" style="max-width: 100%">--}}
{{--        <!-- general form elements disabled -->--}}
{{--        <div class="card card-warning">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">UPDATE REQUEST</h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}
{{--            <div class="card-body">--}}
{{--                <form action="/request/update/{{ $requests -> id }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="alert alert-info alert-dismissible">--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
{{--                        <h5><i class="icon fas fa-info"></i> Alert!</h5>--}}
{{--                        Vui lòng kiểm tra Skill - Job trước khi nhấn Update--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>--}}
{{--                            Request Title--}}
{{--                        </label>--}}
{{--                        <input type="text" class="form-control success" name="title" id="inputSuccess" value="{{ $requests -> title }}" placeholder="Request Title">--}}
{{--                    </div>--}}

{{--                    <div class="form-group" data-select2-id="74">--}}
{{--                        <label>Select Skill</label>--}}
{{--                        <select name="skill_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%">--}}
{{--                            @foreach($vacancyName as $item)--}}
{{--                                <option @if($requests->vacancy_id == $item->id) selected="selected" @endif value="{{ $item -> id }}">{{ $item -> name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-group" data-select2-id="120">--}}
{{--                        <label>Other Skill</label>--}}
{{--                        <div class="select2-purple" data-select2-id="119">--}}
{{--                            <select name="other_id[]" class="select2 select2-hidden-accessible" multiple data-placeholder="Select other skill" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-hidden="true">--}}
{{--                                    @foreach($skillName as $item)--}}
{{--                                        <option @if($item->id == $item->requestSkills->skill_id) selected="selected" @endif value="{{$item -> id}}">{{$item->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Experience--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> experience }}" type="text" class="form-control success" name="experience" id="inputSuccess" placeholder="Request Title">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Slot Recruits--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> numRecruit }}" type="number" class="form-control success" name="numRecruit" id="inputSuccess" placeholder="Request Title">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Level--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> level }}" type="text" class="form-control success" name="level" id="inputSuccess" placeholder="EX: Internship, Junior">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Open Date--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> open }}"  type="date" class="form-control success" name="open" id="inputSuccess" placeholder="EX: Internship, Junior">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Close Date--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> close }}" type="date" class="form-control success" name="close" id="inputSuccess" placeholder="EX: Internship, Junior">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Description--}}
{{--                        </label>--}}
{{--                        <textarea name="description" id="editor"> {!! $requests -> description !!}</textarea>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label" for="inputSuccess">--}}
{{--                            Status (1:ON - 2:OFF)--}}
{{--                        </label>--}}
{{--                        <input value="{{ $requests -> status }}" type="number" class="form-control success" name="status" id="inputSuccess" placeholder="0:OFF - 1:ON">--}}
{{--                    </div>--}}

{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group clearfix">--}}
{{--                            <div class="icheck-success d-inline">--}}
{{--                                <input type="radio" name="status" @if($requests -> status == 1)  checked="" @endif value="1" id="radioSuccess1">--}}
{{--                                <label for="radioSuccess1">--}}
{{--                                    ON--}}
{{--                                </label>--}}
{{--                            </div><br>--}}
{{--                            <div class="icheck-danger d-inline">--}}
{{--                                <input type="radio" name="status" @if($requests -> status == 0) checked="" @endif value="0" id="radioSuccess3">--}}
{{--                                <label for="radioSuccess3">--}}
{{--                                    OFF--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <button type="submit" class="btn btn-success"style="color: white">UPDATE</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <!-- /.card-body -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@foreach($requestSkill as $re)--}}
{{--    Request id:{{ $re -> request_id }} - Skill_id:{{ $re -> skill_id }} - Name: {{ $re->skill->name }}<br>--}}
{{--    @if($re -> request_id == $requests -> id)--}}
{{--        ID trong bảng Request: {{ $requests -> id }}--}}
{{--        - Skill - Job chính: {{ $requests->skill->name }}--}}
{{--        - Other_id: {{ $re -> skill_id }}--}}
{{--        - {{ $re -> skill -> name }}<br>--}}
{{--        --}}
{{--    @endif--}}
{{--@endforeach--}}


@foreach($skillName as $i)
    @if($i -> id == $i -> requestSkills -> skill_id)
        OKKK
    @endif
@endforeach
