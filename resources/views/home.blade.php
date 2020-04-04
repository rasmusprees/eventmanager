@extends('layouts.app')

@section('content')
<div class="container">
    <div class="btn-group d-flex">
        <a href="/home" class="btn btn-primary active">Created Events</a>
        <a href="/new-mission" class="btn btn-primary">Start New Event</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="panel-body">
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
