@extends('home')
@section('content')
    <style>
        b{
            color: red;
            font-size: 12px;
        }
    </style>

    <div class="row justify-content-center">
    <div class="col-md-6" style="max-width: 100%">
        <div class="card card-warning">
            <div class="card-header">
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px; color: white">Edit Recruit: {{ $detail->title }}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/recruits/{{ $detail->id }}" method="POST" id="frmRequest_Edit" novalidate="novalidate">
                    @method('PUT')
                    @csrf
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Alert!</h5>
                        Please Check All Information !!
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Recruit Title <b> (Required)</b>
                        </label>
                        <input type="text" class="form-control success" name="title" id="inputSuccess" value="{{ $detail -> title }}" placeholder="Request Title">
                    </div>

                    <div class="form-group" data-select2-id="74">
                        <label>Vacancy Name <b> (Select Vacancy Name)</b></label>
                        <select name="vacancy_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%">
                            @foreach($vacancy_list as $item)
                            <option @if($detail->vacancy_id == $item->id) selected="selected" @endif value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" data-select2-id="120">
                        <label>Recruit Skills <b> (Select Skill Other On Vacancy Name)</b></label>
                        <div class="select2-purple" data-select2-id="119">
                            <select required name="skills[]" class="select2 select2-hidden-accessible" multiple data-placeholder="Select other skill" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-hidden="true">
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
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Level <b>(Select Experience)</b></label>
                        <select required name="level" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            <option @if($detail -> level == \App\Enums\Levels::Internship) selected="" @endif value="{{ \App\Enums\Levels::Internship }}">Internship</option>
                            <option @if($detail -> level == \App\Enums\Levels::Fresher) selected="" @endif value="{{ \App\Enums\Levels::Fresher }}">Fresher</option>
                            <option @if($detail -> level == \App\Enums\Levels::Junior) selected="" @endif value="{{ \App\Enums\Levels::Junior }}">Junior</option>
                            <option @if($detail -> level == \App\Enums\Levels::Senior) selected="" @endif value="{{ \App\Enums\Levels::Senior }}">Senior</option>
                            <option @if($detail -> level == \App\Enums\Levels::MidLevelManager) selected="" @endif value="{{ \App\Enums\Levels::MidLevelManager }}">MidLevelManager</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Experience <b>(Select Experience)</b></label>
                        <select required name="exp" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            <option @if($detail -> exp == \App\Enums\Experiences::LessThanOneYear) selected = "" @endif value="{{ \App\Enums\Experiences::LessThanOneYear }}"> Less Than 1 Year</option>
                            <option @if($detail -> exp == \App\Enums\Experiences::OneYear) selected = "" @endif value="{{ \App\Enums\Experiences::OneYear }}"> One Year</option>
                            <option @if($detail -> exp == \App\Enums\Experiences::OverOneYear) selected = "" @endif value="{{ \App\Enums\Experiences::OverOneYear }}"> Over 1 year </option>
                            <option @if($detail -> exp == \App\Enums\Experiences::ZeroToThree) selected = "" @endif value="{{ \App\Enums\Experiences::ZeroToThree }}"> 0 - 3 year </option>
                            <option @if($detail -> exp == \App\Enums\Experiences::FourToTen) selected = "" @endif value="{{ \App\Enums\Experiences::FourToTen }}"> 4 - 10 year </option>
                            <option @if($detail -> exp == \App\Enums\Experiences::SevenToTen) selected = "" @endif value="{{ \App\Enums\Experiences::SevenToTen }}"> 7 - 10 year </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-sort-numeric-up-alt"></i>
                        <label> Number of recruits<b> (Values From 1 to 50)</b></label>
                        <input type="number" class="form-control success" min="1" max="50" name="numRecruit" id="inputSuccess" value="{{$detail -> numRecruit}}">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-calendar-minus"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Close Date <b>(Option - Not Empty)</b>
                        </label>
                        <input value="{{ $detail->close_at }}" type="date" class="form-control success" name="close_at" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-file-text"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor_frmEdit"> {!! $detail -> description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-power-off"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Status (1:ON - 2:OFF)
                        </label>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::On) checked="" @endif value="{{ \App\Enums\Status::On }}"  id="radioSuccess1">
                                <label for="radioSuccess1">
                                    ON
                                </label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" @if($detail -> status == \App\Enums\Status::Off) checked="" @endif value="{{\App\Enums\Status::Off}}" id="radioSuccess3">
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
