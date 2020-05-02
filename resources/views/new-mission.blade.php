@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="btn-group d-flex">
            <a href="/home" class="btn btn-primary">Created Events</a>
            <a href="/new-mission" class="btn btn-primary active">Start New Event</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-body">
                        <form method="POST" action="/new-mission">
                            @csrf

                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> 1. Olukord
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 2. Missioon
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3" autocomplete="off" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 3. Läbiviimine
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option4" autocomplete="off" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> 4. Toetus
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option5" autocomplete="off" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> 5. Kommunikatsioon
                                </label>
                            </div>


                            <div id="accordion">

                                <div class="card">
                                    <!--1. missioon-->
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Sündmuse nimi:</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" name="mission_name" id="mission_name" required></textarea>
                                                <label for="from_date">Sündmuse toimumise aeg:</label>
                                                <my-datepicker></my-datepicker>
                                                <label for="stay_at_night">Kus sündmus toimub? Koha nimi ja millised on ööbimisvõimalused. Kuidas on parkimisega?:</label>
                                                <textarea class="form-control" rows="4" placeholder="kus toimub" name="stay_at_night" id="stay_at_night"></textarea>
                                                <label for="local_activities">Loetle üles vaba aja veetmise võimalused:</label>
                                                <textarea class="form-control" rows="4" placeholder="vaba aeg" name="local_activities" id="local_activities"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <!--2. olukord-->
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="main_goal">Mis on sündmuse eesmärk?:</label>
                                                <textarea class="form-control" rows="1" name="main_goal" id="main_goal" required></textarea>
                                                <label for="team_name">Kui osalejad moodustavad meeskonnad, siis kes millisesse meeskonda kuulub:</label>
                                                <textarea class="form-control" rows="1" placeholder="meeskonna nimi" name="team_name" id="team_name"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <!--3. läbiviimine-->
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="movement_to_location">Liikumine ürituse toimumise paika. Erinevad transpordi variandid(väljumised kellaajaliselt, peatused kellaajaliselt, piletite hinnad):</label>
                                                <textarea class="form-control" rows="1" placeholder="liikumine sinna" name="movement_to_location" id="movement_to_location" required></textarea>
                                                <label for="movement_from_location">Liikumine ürituse toimumise paigast tagasi koju. Erinevad transpordi variandid(väljumised kellaajaliselt, peatused kellaajaliselt, piletite hinnad):</label>
                                                <textarea class="form-control" rows="1" placeholder="liikumine tagasi" name="movement_from_location" id="movement_from_location" required></textarea>
                                                <label for="assignments">Osalejate ülesanded. Kui osalejatel on spetsiaalseid ülesandeid, siis täpsustada täitmise kellaaeg, koht ja viis:</label>
                                                <textarea class="form-control" rows="1" placeholder="ülesanded" name="assignments" id="assignments"></textarea>
                                                <label for="timeline">Sündmuse timeline:</label>
                                                <textarea class="form-control" rows="1" placeholder="Siin saab sisestada ürituse siseseid sündmuseid" id="timeline" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <!--4. toetus-->
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="food">Kus ja mis kell toimub toitlustamine. Kas kohapeal kõik olemas või tuleb midagi kaasa võtta. Kes võtab mida(söögid,joogid,toidunõud)?:</label>
                                                <textarea class="form-control" rows="1" placeholder="toitlustus" name="food" id="food"></textarea>
                                                <label for="clothing">Riietus:</label>
                                                <textarea class="form-control" rows="1" placeholder="riietus" name="clothing" id="clothing"></textarea>
                                                <label for="equipment">Eritehnika. Mis võimalused on kohapeal olemas ja kas midagi on vaja kaasa võtta? Kui on vaja midagi kaasa võtta, siis täpsustada, kes mida võtab:</label>
                                                <textarea class="form-control" rows="1" placeholder="tehnika" name="equipment" id="equipment"></textarea>
                                                <label for="budget">Sündmuse korraldamiseks/osalemiseks kuluv raha. Lahti kirjutada kõik võimalikud rahalised väljaminekud:</label>
                                                <textarea class="form-control" rows="1" placeholder="raha" name="budget" id="budget"></textarea>
                                                <label for="emergency">Käitumine hädaolukorras. Meditsiiniline tugi, kust saab abi, kes vastutab? Kust leiab sündmuse vastutavad isikud ja isikud kelle käest saab jooksvalt olulist infot? Asendusskeem juhul, kui mõni oluline isik ei ole enam kättesaadav:</label>
                                                <textarea class="form-control" rows="1" placeholder="häda" name="emergency" id="emergency"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <!--5. kommunikatsioon-->
                                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="coms">Kuidas toimub suhtlus(näited siin)? Milline on tagavara suhtluskanal, kui esmane ei toimi? Kui kasutatakse lisaks ka mingit märguannete abil suhtlemist, siis see siin ka ära kirjeldada:</label>
                                                <textarea class="form-control" rows="1" placeholder="suhtlus" name="coms" id="coms"></textarea>
                                                <label for="names_and_numbers">Nimekiri olulistest nimedest, numbritest ja emaili aadressidest:</label>
                                                <textarea class="form-control" rows="1" placeholder="nimed ja numbrid" name="names_and_numbers" id="names_and_numbers"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
