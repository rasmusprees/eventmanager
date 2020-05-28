@extends('layouts.app')

@section('content')
<div class="container">
    <div class="btn-group d-flex">
        <a href="/home" class="btn btn-primary mb-1 active">Loodud sündmused</a>
        <a href="/new-mission" class="btn btn-primary mb-1">Planeeri uus sündmus</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <label for="mission" class="control-label"><h1>Sündmused:</h1></label>

                    <!-- Lists all missions on the db. $mission_list is a list of all missions in the database.
                    Pressing on the link, selected missions id will be used as a part of the page
                    address to display selected mission details -->
                        @foreach($mission_list as $mission)
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

                    <!-- if $current_mission is sent via controller,
                    then the view displays details of the selected mission -->
                    @isset($current_mission)

                        <!-- weather API returns its forecast -->
                        <p>Ilmaennustus kuvatakse vaid juhul, kui sündmuse toimumise aeg jääb järgmise nelja päeva sisse.</p>
                        <div>

                            <!-- <p>{$mycache}} </p> -->
                            @if ($mission_start_date <= $forecast_end_date)
                            <!--for tsükkel jookseb nii kaua kuni jätkub ilmateadet, kui üritus lõppeb enne ilmateate lõppu,
                            siis kuvatakse vaid see ilmateade mis jääb ürituse raamidesse-->
                            <!--$i!==-1 on sellepärast et muidu jääbki for tsükkel jooksma-->

                                @for ($i=$forecast_days_left; $i <= 5 && $i!==-1; --$i)
                                    @if ($xmldata->forecast[3 - $i]['date'] <= $mission_end_date)
                                    <div>
                                        <h3>{{$xmldata->forecast[3 - $i]['date']}}</h3>
                                        <h3>öösel:</h3> {{$xmldata->forecast[3 - $i]->night->text}}
                                        <br>
                                        <h3>päeval:</h3> {{$xmldata->forecast[3 - $i]->day->text}}
                                        <br>
                                    </div>
                                    <!--array_push($weather_storage, [$forecast_date, $weather_at_night, $weather_at_day]);-->
                                    @else
                                    @break
                                    @endif
                                @endfor
                            @else
                            TÄHELEPANU! Äpp näitab ilmateadet vaid 4 päeva ulatuses - {{$xmldata->forecast[0]['date']}} kuni {{$xmldata->forecast[3]['date']}}, kui Teie üritus jääb kaugemale tulevikku, siis kahjuks ilmateadet kuvada ei ole võimalik!
                            @endif
                        </div>

                        <h1 class="card-title">{{$current_mission->mission_name}}</h1>
                        <h5 class="card-title">1. OLUKORD</h5>
                            <ul>
                                <li><p class="card-text">Toimumise kuupäevad: {{$current_dates->from_date}} kuni {{$current_dates->to_date}}</p></li>
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
