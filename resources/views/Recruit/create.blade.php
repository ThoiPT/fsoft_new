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
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <a class="btn btn-group-toggle" style="font-weight: bold; font-size: 23px; color: white">ADD RECRUIT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('recruits.store') }}" method="POST" novalidate="novalidate" id="frmRequest">
                    @csrf
                    <input name="user_id" hidden value="{{ auth()->user()->id }}">
                    <input hidden name="department_id" value="{{optional(\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->department)->id }}">

                    <div class="form-group">
                        <i class="fa-solid fa-keyboard"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Recruit Name <b>(Required)</b>
                        </label>
                        <input type="text" class="form-control success" name="title" id="inputSuccess" minlength="11" placeholder="Request Title">
                    </div>

                    <div class="form-group" data-select2-id="74">
                        <i class="fa-solid fa-inbox"></i>
                        <label>Vacancy <b>(Select Vacancy)</b></label>
                        <select name="vacancy_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach ($vacancy_list as $v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group" data-select2-id="120">
                        <i class="fa-solid fa-spell-check"></i>
                        <label>Recruit Skills <b>(Required)</b></label>
                        <div class="select2-purple" data-select2-id="119">
                            <select required name="skills[]" class="select2 select2-hidden-accessible" multiple data-placeholder="Select other skill" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-hidden="true">
                                @foreach ($skill_list as $v)
                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Level <b>(Select Experience)</b></label>
                        <select required name="level" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            <option value="{{ \App\Enums\Levels::Internship }}">Internship</option>
                            <option value="{{ \App\Enums\Levels::Fresher }}">Fresher</option>
                            <option value="{{ \App\Enums\Levels::Junior }}">Junior</option>
                            <option value="{{ \App\Enums\Levels::Senior }}">Senior</option>
                            <option value="{{ \App\Enums\Levels::MidLevelManager }}">MidLevelManager</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <i class="fa-solid fa-user-lock"></i>
                        <label> Experience <b>(Select Experience)</b></label>
                        <select required name="exp" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" >
                            <option value="{{ \App\Enums\Experiences::LessThanOneYear }}"> Less Than 1 Year</option>
                            <option value="{{ \App\Enums\Experiences::OneYear }}"> One Year</option>
                            <option value="{{ \App\Enums\Experiences::OverOneYear }}"> Over 1 year </option>
                            <option value="{{ \App\Enums\Experiences::ZeroToThree }}"> 0 - 3 year </option>
                            <option value="{{ \App\Enums\Experiences::FourToTen }}"> 4 - 10 year </option>
                            <option value="{{ \App\Enums\Experiences::SevenToTen }}"> 7 - 10 year </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-sort-numeric-up-alt"></i>
                        <label> Number of recruits<b> (Values From 1 to 50)</b></label>
                        <input type="number" class="form-control success" min="1" max="50" name="numRecruit" id="inputSuccess" placeholder="Input Value">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-calendar"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Open Date <b>(Required)</b>
                        </label>
                        <input type="date" min="{{$timeFormat}}" class="form-control success" name="open_at"  id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-calendar-minus"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Close Date <b>(Required)</b>
                        </label>
                        <input type="date" min="{{$timeFormat}}" class="form-control success" name="close_at" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-file-text"></i>
                        <label class="col-form-label" for="inputSuccess">
                            Description
                        </label>
                        <textarea name="description" id="editor"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="status" value="1" id="radioSuccess1">
                                <label for="radioSuccess1">ON</label>
                            </div><br>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" value="0" id="radioSuccess3">
                                <label for="radioSuccess3">OFF</label>
                            </div><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger" style="color: white">ADD RECRUIT</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
