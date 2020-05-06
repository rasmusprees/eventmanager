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
                        <label for="mission" class="control-label"><h1>Your Events:</h1></label>
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
                                <li><p class="card-text">Kuupäevad.</p></li>
                                <li><p class="card-text">Kus toimub: {{$current_local_situation->stay_at_night}}.</p></li>
                                <li><p class="card-text">Võimalikud tegevused: {{$current_local_situation->local_activities}}</p></li>
                            </ul>
                        <h5 class="card-title">2. MISSIOON</h5>
                            <ul>
                                <li><p class="card-text">Ettevõtmise eesmärk: {{$current_mission->main_goal}}</p></li>
                                <li><p class="card-text">Meeskonnad: {{$current_mission->main_goal}}</p></li>
                            </ul>
                        <h5 class="card-title">3. LÄBIVIIMINE</h5>
                            <ul>
                                <li><p class="card-text">Liikumine üritusele: {{$current_mission->movement_to_location}}</p></li>
                                <li><p class="card-text">Liikumine ürituselt tagasi: {{$current_mission->movement_from_location}}</p></li>
                                <li><p class="card-text">Ülesanded: {{$current_assignments->assignments}}</p></li>
                                <li><p class="card-text">Ajajoon: <i>arenduses</i></p></li>
                            </ul>
                        <h5 class="card-title">4. TOETUS</h5>
                            <ul>
                                <li><p class="card-text">Toitlustus: {{$current_support->food}}</p></li>
                                <li><p class="card-text">Riietus: {{$current_support->clothing}}</p></li>
                                <li><p class="card-text">Tehnika: {{$current_support->equipment}}</p></li>
                                <li><p class="card-text">Eelarve: {{$current_budget->budget}}</p></li>
                                <li><p class="card-text">Erijuhud: {{$current_support->emergency}}</p></li>
                            </ul>
                        <h5 class="card-title">5. KOMMUNIKATSIOON</h5>
                            <ul>
                                <li><p class="card-text">Suhtlus: {{$current_communications->coms}}</p></li>
                                <li><p class="card-text">Nimed ja numbrid: {{$current_communications->names_and_numbers}}</p></li>
                            </ul>
                    @endisset
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
