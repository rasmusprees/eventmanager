<?php

namespace App\Http\Controllers;

use App\Participants;
use Illuminate\Http\Request;
use App\Mission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

        $mission_list = Mission::all();

        return view('home', compact('mission_list'));
    }

    public function show($mission_id)
    {
        //$mission_list = Mission::find('mission_id', $mission_id);
        //$post = Post::find($mission_id);
        //return view('home', compact('mission_list', 'post'));

        $mission_list = Mission::all();
        return view('home', [
            'mission' => Mission::findOrFail($mission_id),
            'mission_list' => $mission_list,
            'current_mission' => Mission::find($mission_id)
        ]);
    }


}
