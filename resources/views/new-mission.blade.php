@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="btn-group d-flex">
            <a href="/home" class="btn btn-primary">Created Events</a>
            <a href="/new-mission" class="btn btn-primary active">Start New Event</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-body">
                        <form action="/action_page.php">
                            <div id="accordion">

                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                            1. OLUKORD
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Sündmuse nimi:</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" id="mission_name"></textarea>
                                                <label for="timeline">Sündmuse toimumise aeg:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Lisa osalejad:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Kus sündmus toimub? Koha nimi ja millised on ööbimisvõimalused. Kuidas on parkimisega?:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Loetle üles vaba aja veetmise võimalused:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                            2. MISSIOON
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Mis on sündmuse eesmärk?:</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" id="mission_name"></textarea>
                                                <label for="timeline">Kui osalejad moodustavad meeskonnad, siis kes millisesse meeskonda kuulub:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                            3. LÄBIVIIMINE
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Liikumine ürituse toimumise paika. Erinevad transpordi variandid(väljumised kellaajaliselt, peatused kellaajaliselt, piletite hinnad):</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" id="mission_name"></textarea>
                                                <label for="timeline">Liikumine ürituse toimumise paigast tagasi koju. Erinevad transpordi variandid(väljumised kellaajaliselt, peatused kellaajaliselt, piletite hinnad):</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Osalejate ülesanded. Kui osalejatel on spetsiaalseid ülesandeid, siis täpsustada täitmise kellaaeg, koht ja viis:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Sündmuse timeline:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                            4. TOETUS
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Kus ja mis kell toimub toitlustamine. Kas kohapeal kõik olemas või tuleb midagi kaasa võtta. Kes võtab mida(söögid,joogid,toidunõud)?:</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" id="mission_name"></textarea>
                                                <label for="timeline">Riietus:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Eritehnika. Mis võimalused on kohapeal olemas ja kas midagi on vaja kaasa võtta? Kui on vaja midagi kaasa võtta, siis täpsustada, kes mida võtab:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Sündmuse korraldamiseks/osalemiseks kuluv raha. Lahti kirjutada kõik võimalikud rahalised väljaminekud:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                                <label for="timeline">Käitumine hädaolukorras. Meditsiiniline tugi, kust saab abi, kes vastutab? Kust leiab sündmuse vastutavad isikud ja isikud kelle käest saab jooksvalt olulist infot? Asendusskeem juhul, kui mõni oluline isik ei ole enam kättesaadav:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                            5. KOMMUNIKATSIOON
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="mission_name">Kuidas toimub suhtlus(näited siin)? Milline on tagavara suhtluskanal, kui esmane ei toimi? Kui kasutatakse lisaks ka mingit märguannete abil suhtlemist, siis see siin ka ära kirjeldada:</label>
                                                <textarea class="form-control" rows="1" placeholder="Event Name" id="mission_name"></textarea>
                                                <label for="timeline">Nimekiri olulistest nimedest, numbritest ja emaili aadressidest:</label>
                                                <textarea class="form-control" rows="1" placeholder="Timeline" id="timeline"></textarea>
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
