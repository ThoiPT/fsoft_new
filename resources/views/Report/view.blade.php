@extends('home')
@section('content')
    <div class="col-md-6" style="max-width: 100%">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Date picker</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Date Start:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <input type="date" class="form-control float-right" name="startDate" id="startDate">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Date End:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label for="reservation"></label><input type="date" name="endDate" class="form-control float-right" id="endDate">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="/report/process" onclick="showData()" class="btn btn-primary">Submit</a>
                </div>
                {{ csrf_field() }}
                <div id="post_data">
{{--                    <table>--}}
{{--                        <!-- Code // -->--}}
{{--                    </table>--}}

                    Start Date<p id ="start_Date"></p>
                    End Date<p id ="end_Date"></p>
                </div>
                <!-- /.form group -->
            </div>
            <div class="card-footer">
                Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples and information about
                the plugin.
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <script>
        function showData()
        {
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            document.getElementById('start_Date').innerHTML = startDate;
            document.getElementById('end_Date').innerHTML = endDate;
        }
    </script>
@endsection
