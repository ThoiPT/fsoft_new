@extends('home')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6" style="max-width: 100%">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">ADD RECRUIT</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('recruits.store') }}" method="POST" novalidate="novalidate" id="frmRequest">
                    @csrf
                    <input name="user_id" hidden value="{{ auth()->user()->id }}">
                    <input hidden name="department_id" value="{{optional(\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->department)->id }}">

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>
                            Recruit Name
                        </label>
                        <input type="text" class="form-control success" name="title" id="inputSuccess" value="{{old("title")}}" placeholder="Request Title">
                    </div>

                    <div class="form-group" data-select2-id="74">
                        <label>Vacancy</label>
                        <select name="vacancy_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach ($vacancy_list as $v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group" data-select2-id="120">
                        <label>Recruit Skills</label>
                        <div class="select2-purple" data-select2-id="119">
                            <select required name="skills[]" class="select2 select2-hidden-accessible" multiple data-placeholder="Select other skill" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-hidden="true">
                                @foreach ($skill_list as $v)
                                <option value="{{ $v->id }}">{{ $v->name }}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Experience
                        </label>
                        <input type="text" class="form-control success" name="exp" id="inputSuccess" value="{{old("experience")}}" placeholder="Experience">
                    </div>


                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Slot Recruits
                        </label>
                        <input type="number" class="form-control success" name="numRecruit" value="{{old("numRecruit")}}" id="inputSuccess" placeholder="Slot">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Level
                        </label>
                        <input type="text" class="form-control success" name="level" value="{{old("level")}}" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Open Date
                        </label>
                        <input type="date" class="form-control success" name="open_at" value="{{old("open")}}" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">
                            Close Date
                        </label>
                        <input type="date" class="form-control success" name="close_at" value="{{old("close")}}" id="inputSuccess" placeholder="EX: Internship, Junior">
                    </div>

                    <div class="form-group">
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
