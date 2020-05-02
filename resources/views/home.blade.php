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
                            <!--<a href="/home/{{$mission->mission_id}}" class="list-group-item list-group-item-action">{{$mission->mission_name}}</a>-->
                                <a href="/home/{{$mission->mission_id}}" class="list-group-item list-group-item-action">{{$mission->mission_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Show weather details -->
        <!-- Show selected mission details -->
        <div class="col-sm-8">
            <div class="card h-100">
                <div class="card-body">
                <div class="container">
                    @isset($current_mission)
                        <p>Weather report for {{$forecast_start_date}}</p>
                        <h1 class="card-title">{{$current_mission->mission_name}}</h1>
                        <h5 class="card-title">1. OLUKORD</h5>
                        <ul>
                            <li><p class="card-text">Pikk pikk pikk tekst.</p></li>
                            <li><p class="card-text">Pikk pikk pikk tekst.</p></li>
                            <li><p class="card-text">Pikk pikk pikk tekst.</p></li>
                            <li><p class="card-text">Pikk pikk pikk tekst.</p></li>
                        </ul>


                        <h5 class="card-title">2. MISSIOON</h5>

                        <h5 class="card-title">3. LÄBIVIIMINE</h5>

                        <h5 class="card-title">4. TOETUS</h5>

                        <h5 class="card-title">5. KOMMUNIKATSIOON</h5>

                    @endisset
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
