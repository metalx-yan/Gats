<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Expertise;
use Carbon\Carbon;
use Auth;
use App\Models\Generate;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showgencurri($level, $major, $expertise)
    {
        $showexpert = Expertise::find($expertise);
        $major1 = Major::all();
        $gens = Generate::where('role_id', Auth::user()->role->id)->where('major_id', $major)->get();
        return view('curriculums.generates.setup', compact(['showexpert', 'major1', 'gens']));
    }

    // public function showgenmajor($level, $major, $expertise)
    // {
    //     $showexpert = Expertise::find($expertise);
    //     $major1 = Major::all();
    //     $gens = Generate::where('role_id', Auth::user()->role->id)->where('major_id', $major)->get();

    //     return view('curriculums.generates.setup', compact(['showexpert', 'major1', 'gens']));
    // }

    public function showmixcurri($level, $major)
    {
        $mixcurriculum = Major::find($major);
        
        return view('curriculums.generates.index', compact(['mixcurriculum']));
    }

    public function showmixmajor($level, $major)
    {
        $mixcurriculum = Major::find($major);
        
        return view('curriculums.generates.index', compact(['mixcurriculum']));

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'day'   => 'required',
            'start' => 'required',
            'teacher_id' => 'required',
            'room_id' => 'required',
            'lesson_id' => 'required',
            'major_id' => 'required'
        ]);
        
        if ($request->start == '10:00:00') {
            $sesi = 15 * $request->sesi;
        }
        else {
            $sesi = 45 * $request->sesi;

        }
        $create = new Generate;
        $create->day = $request->day;
        $create->start = $request->start;
        $create->end = Carbon::parse($request->start)->addMinutes($sesi);
        $create->teacher_id = $request->teacher_id;
        $create->room_id = $request->room_id;
        $create->lesson_id = $request->lesson_id;
        $create->major_id = $request->major_id;
        $create->user_id = Auth::user()->id;
        $create->role_id = Auth::user()->role->id;
        $create->save();

        return back()->with('sweetalert', 'Berhasil Menambah Data Atur Jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
