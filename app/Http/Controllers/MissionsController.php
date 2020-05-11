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
use Carbon\Carbon;
use function foo\func;

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
        $dates->from_date = Carbon::parse($request->from_date);
        $dates->to_date = Carbon::parse($request->to_date);
        $dates->mission_id = $mission->mission_id;
        $dates->save();


        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    public function show($mission_id)
    {
        $xmldata = simplexml_load_file("http://www.ilmateenistus.ee/ilma_andmed/xml/forecast.php") or die("Failed to load");
        $forecast_start_date = $xmldata->forecast[0]['date'];//get first available date for a forecast
        $forecast_end_date = $xmldata->forecast[3]['date'];//get last available date for a forecast
        $mission_start_date = Dates::find($mission_id)->from_date;//get the date for the first day of the mission
        $mission_end_date = Dates::find($mission_id)->to_date;//get the date for the last day of the mission
        $mission_list = Mission::all();
        $weather_storage = [];

        function weatherman($mission_start_date, $forecast_end_date, $mission_end_date, $xmldata) {
            if ($mission_start_date <= $forecast_end_date) {
                /*$forecast_days_left näitab ürituse alguse ja ilmaennustuse viimase päeva vahet, vaja arvutuste jaoks*/
                $forecast_days_left = ((strtotime($forecast_end_date)) - (strtotime($mission_start_date)))/60/60/24;
                /*for tsükkel jookseb nii kaua kuni jätkub ilmateadet, kui üritus lõppeb enne ilmateate lõppu,
                siis kuvatakse vaid see ilmateade mis jääb ürituse raamidesse*/
                /*$i!==-1 on sellepärast et muidu jääbki for tsükkel jooksma*/
                for ($i=$forecast_days_left; $i <= 4 && $i!==-1; $i--) {
                    if ($xmldata->forecast[(3 - $i)]['date'] <= $mission_end_date) {
                        echo "<div>";
                        echo $xmldata->forecast[(3 - $i)]['date'];
                        echo "</br>";
                        echo $xmldata->forecast[(3 - $i)]->night->text;
                        echo $xmldata->forecast[(3 - $i)]->day->text;
                        echo "</br>";
                        echo "</div>";
                        //array_push($weather_storage, [$forecast_date, $weather_at_night, $weather_at_day]);
                    } else {
                        break;
                    }
                }
            } else {
                echo "TÄHELEPANU! Äpp näitab ilmateadet vaid 4 päeva ulatuses (" . $xmldata->forecast[0]['date'] . " kuni " . $xmldata->forecast[3]['date'] . "), kui Teie üritus jääb kaugemale tulevikku, siis kahjuks ilmateadet kuvada ei ole võimalik!";
            }
        }
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
            'weatherman' => weatherman($mission_start_date, $forecast_end_date, $mission_end_date, $xmldata)


        ]);
    }
}
