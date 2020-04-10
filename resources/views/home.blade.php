@extends('layouts.app')

@section('content')
<div class="container">
    <div class="btn-group d-flex">
        <a href="/home" class="btn btn-primary mb-1 active">Created Events</a>
        <a href="/new-mission" class="btn btn-primary mb-1">Start New Event</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <label for="mission" class="control-label">Your Events:</label>
                    <!-- Current Tasks -->
                        @foreach($mission_list as $mission)
                            <a href="#" class="list-group-item list-group-item-action">{{$mission->mission_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card h-100">
                <div class="card-body">
                <div class="container">
                    @yield('edit-mission')
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
