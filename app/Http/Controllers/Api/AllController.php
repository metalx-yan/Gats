<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Expertise;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Level;
use App\Models\Major;

class AllController extends Controller
{
    public function rooms()
    {
        return response()->json(Room::all());
    }

    public function expertises()
    {
        return response()->json(Expertise::all());
    }

    public function lessons()
    {
        return response()->json(Lesson::all());
    }

    public function teachers()
    {
        return response()->json(Teacher::all());
    }

    public function levels()
    {
        return response()->json(Level::all());
    }

    public function majors()
    {
        return response()->json(Major::all());
    }
}
