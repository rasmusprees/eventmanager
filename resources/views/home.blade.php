@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br><br>

                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors katki -->
                    <!-- @ include('common.errors') katki -->

                <!-- New Task Form -->
                    <form action="{{ url('home') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="mission" class="col-sm-3 control-label">Event</label>

                            <div class="col-sm-6">
                                <input type="text" name="mission_name" id="mission-name" class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Event
                                </button>
                            </div>
                        </div>
                    </form>


                        <div class="col-sm-offset-3 col-sm-6">
                            <div class="list-group list-group-flush">
                                <label for="mission" class="col-sm-6 control-label">Your Events:</label>
                            <!-- Current Tasks -->
                                @foreach($missions as $mission)
                                    <a href="#" class="list-group-item list-group-item-action">{{$mission->mission_name}}</a>
                                @endforeach
                            </div>
                        </div>


                </div>




            </div>
        </div>
    </div>
</div>
@endsection
