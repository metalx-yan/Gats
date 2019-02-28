<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Generate;
use App\Models\TypeRoom;
use App\Models\TypeLesson;
use App\Models\TypeTeacher;
use App\Models\Major;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function hours($day, $major)
    {
    	$hours = [];
    	$start = Carbon::parse('07:00:00');
        $istirahat = Generate::whereNull('teacher_id')->where('day', $day)->get();
    	for ($i=0; $i < 10; $i++) {
            if ($istirahat->where('expertise_id', $major)->where('start', $start->format('H:i:s'))->first()) {
                if ($istirahat->where('expertise_id', $major)->where('start', $start->format('H:i:s'))->first()->istirahat()) {
                    $start->addMinutes(30);
                } else {
                	array_push($hours, $start->format('H:i:s') . '(jam kosong)');
                    $start->addMinutes(45);
                }
            } else {
                if (Generate::where('day', $day)->where('expertise_id', $major)->where('start', $start->format('H:i:s'))->first()) {
                    $start->addMinutes(45);
                } else {
                    array_push($hours, $start->format('H:i:s'));
                    $start->addMinutes(45);
                }
            }
    	}
        return response()->json($hours);
    }

    public function rooms($type, $day, $hour, $sesi)
    {
        $resp = [];
        foreach (TypeRoom::where('slug', $type)->first()->rooms as $room) {
            if (is_null(Generate::where('day', $day)->where('start', $hour)->where('room_id', $room->id)->first())) {
                array_push($resp, $room);
            }
        }
        return response()->json($resp);
    }

    public function typeTeacher($id)
    {
        $type = TypeTeacher::find($id);
    	return response()->json($type->teachers);
    }

    public function major($id)
    {
        $major = Major::find($id);
        return response()->json($major->expertises);
    }

    public function generates($major, $expertise)
    {
        $generate = Generate::where('major_id', $major)->where('expertise_id', $expertise);
        return response()->json($generate->with(['teacher', 'room', 'lesson', 'major'])->get());
    }
}
