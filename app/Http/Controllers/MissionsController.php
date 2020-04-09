<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
use Illuminate\Support\Facades\Validator;

class MissionsController extends Controller
{



    public function showMissions()
    {
        $mission_list = Mission::all();

        return view('home', ['missions' => $mission_list]);
    }

    public function createMission()
    {
        return view('new-mission');
    }

    public function store(Request $request)
    {
        $mission = new Mission;
        $mission->mission_name = $request->mission_name;
        $mission->main_goal = $request->main_goal;
        $mission->movement_to_location=$request->movement_to_location;
        $mission->movement_from_location=$request->movement_from_location;
        $mission->save();

        return view('/home');
    }


}
