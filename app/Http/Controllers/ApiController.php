<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Generate;
use App\Models\TypeRoom;
use App\Models\TypeLesson;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function hours($day)
    {
    	$hours = [];
    	$start = Carbon::parse('07:00:00');
    	for ($i=0; $i < 10; $i++) { 
        	array_push($hours, $start->format('H:i:s'));
    		if ($start->format('H:i:s') == '10:00:00') {
                $start->addMinutes(15);
            }
            else {
                $start->addMinutes(45);
            }
    	}
        return response()->json($hours);
    }

    public function rooms($type, $day, $hour, $sesi)
    {
        $resp = [];
        foreach (TypeRoom::where('slug', $type)->first()->rooms as $room) {
            if ($sesi == 1) {
                if (is_null(Generate::where('day', $day)->where('start', $hour)->where('room_id', $room->id)->first())) {
                    array_push($resp, $room);
                }
            } else {
                $time = Carbon::parse($hour)->addMinute('45');
                if (is_null(Generate::where('day', $day)->where('start', $hour)->orWhere('start', $time)->where('room_id', $room->id)->first())) {
                    array_push($resp, $room);
                }
            }
        }
    	return response()->json($resp);
    }

      
}
