<?php

namespace App\Http\Controllers;

use App\Participants;
use Illuminate\Http\Request;
use App\Mission;
use App\Assignments;
use App\Budget;
use App\Communications;
use App\Coordinates;
use App\Dates;
use App\LocalSituation;
use App\Support;
use App\Teams;
use App\Timeline;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class MissionsController extends Controller
{



    public function showMissions()
    {
        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    public function createMission()
    {
        return view('new-mission');
    }

    public function sendToDb(Request $request)
    {
        $mission = new Mission;
        $mission->mission_name = $request->mission_name;
        $mission->main_goal = $request->main_goal;
        $mission->movement_to_location=$request->movement_to_location;
        $mission->movement_from_location=$request->movement_from_location;
        $mission->save();

        $participants = new Participants;
        $participants->mission_id = $mission->mission_id;
        $participants->users_id = Auth::id();
        $participants->save();

        $local_situation = new LocalSituation;
        $local_situation->local_activities = $request->local_activities;
        $local_situation->stay_at_night = $request->stay_at_night;
        $local_situation->mission_id = $mission->mission_id;
        $local_situation->save();

        $teams = new Teams;
        $teams->team_name = $request->team_name;
        $teams->mission_id = $mission->mission_id;
        $teams->save();

        $assignments = new Assignments;
        $assignments->assignments = $request->assignments;
        $assignments->team_id = $teams->team_id;
        $assignments->participants_id = $participants->participants_id;
        $assignments->mission_id = $mission->mission_id;
        $assignments->save();

        $support = new Support;
        $support->food = $request->food;
        $support->clothing = $request->clothing;
        $support->equipment = $request->equipment;
        $support->emergency = $request->emergency;
        $support->mission_id = $mission->mission_id;
        $support->save();

        $budget = new Budget;
        $budget->budget = $request->budget;
        $budget->mission_id = $mission->mission_id;
        $budget->save();

        $coms = new Communications;
        $coms->coms = $request->coms;
        $coms->names_and_numbers = $request->names_and_numbers;
        $coms->mission_id = $mission->mission_id;
        $coms->save();

        $dates = new Dates;
        $dates->from_date = $request->from_date;
        $dates->to_date = $request->to_date;
        $dates->mission_id = $mission->mission_id;
        $dates->save();

        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    public function show($mission_id)
    {
        $xmldata = simplexml_load_file("http://www.ilmateenistus.ee/ilma_andmed/xml/forecast.php") or die("Failed to load");
        $mission_list = Mission::all();



        return view('home', [
            'mission' => Mission::findOrFail($mission_id),
            'mission_list' => $mission_list,
            'current_mission' => Mission::find($mission_id),
            'forecast_start_date' => $xmldata->forecast[0]['date']
        ]);
    }

}
