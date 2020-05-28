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
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Carbon\Carbon;
use function foo\func;

class MissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*returns home view with the list of all missions*/
    public function showMissions()
    {
        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    /*opens new-mission page, where the user can start a new event*/
    public function createMission()
    {
        return view('new-mission');
    }

    //sends and saves data to database when creating a new event
    //returns to home view with a list of all missions
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
        $dates->from_date = Carbon::parse($request->from_date);
        $dates->to_date = Carbon::parse($request->to_date);
        $dates->mission_id = $mission->mission_id;
        $dates->save();


        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    /*request weather info from remote API*/
    /*sends data from database to be shown on home view when user views a selected mission*/
    public function show($mission_id)
    {
        $xmldata = simplexml_load_file("http://www.ilmateenistus.ee/ilma_andmed/xml/forecast.php") or die("Failed to load");
        $forecast_start_date = $xmldata->forecast[0]['date'];//get first available date for a forecast
        $forecast_end_date = $xmldata->forecast[3]['date'];//get last available date for a forecast
        $mission_start_date = Dates::find($mission_id)->from_date;//get the date for the first day of the mission
        $mission_end_date = Dates::find($mission_id)->to_date;//get the date for the last day of the mission
        $mission_list = Mission::all();
        $forecast_days_left = ((strtotime($forecast_end_date)) - (strtotime($mission_start_date)))/60/60/24;

        //for weather API cache
        /*if cashe get = not set, siis lisa xmldata cachesse, else küsi data cachest.*/
        Cache::add('item', "weather is good", 50);
        $mycache = Cache::get('item');


        //send data to view
        return view('home', [
            'mission' => Mission::findOrFail($mission_id),
            'mission_list' => $mission_list,
            'current_mission' => Mission::find($mission_id),
            'current_assignments' => Assignments::find($mission_id),
            'current_budget' => Budget::find($mission_id),
            'current_communications' => Communications::find($mission_id),
            'current_coordinates' => Coordinates::find($mission_id),
            'current_dates' => Dates::find($mission_id),
            'current_local_situation' => LocalSituation::find($mission_id),
            'current_participants' => Participants::find($mission_id),
            'current_support' => Support::find($mission_id),
            'current_timeline' => Timeline::find($mission_id),
            'forecast_start_date' => $xmldata->forecast[0]['date'],
            'mission_start_date' => $mission_start_date,
            'mission_end_date' => $mission_end_date,
            'forecast_end_date' => $forecast_end_date,
            'xmldata' => $xmldata,
            'forecast_days_left' => $forecast_days_left,
            'mycache' => $mycache
        ]);
    }

}
