<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
use Illuminate\Support\Facades\Validator;

class MissionsController extends Controller
{

    public function saveMission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mission_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }

        $event = new Mission;
        $event->mission_name = $request->mission_name;
        $event->save();

        return redirect('/home');
    }

    public function showMissions()
    {
        $mission_list = Mission::all();

        return view('home', ['missions' => $mission_list]);
    }


}
