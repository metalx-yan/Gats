<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Expertise;
use Carbon\Carbon;

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
        return view('curriculums.generates.setup', compact(['showexpert', 'major1']));
    }

    public function showgenmajor($level, $major, $expertise)
    {
        $showmajor = Expertise::find($expertise);
        
        return view('majors.generates.setup', compact(['showmajor']));
    }

    public function showmixcurri($level, $major)
    {
        $mixcurriculum = Major::find($major);
        
        return view('curriculums.generates.index', compact(['mixcurriculum']));
    }

    public function showmixmajor($level, $major)
    {
        $mixmajor = Major::find($major);
        
        return view('majors.generates.index', compact(['mixmajor']));
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

        dd($request);

        $this->validate($request, [
            'day'   => 'required',
            'start' => 'required',
            'end' => 'required',
            'read' => 'required',
            'teacher_id' => 'required',
            'room_id' => 'required',
            'lesson_id' => 'required',
            'user_id' => 'required',
            'role_id' => 'required',
            'expertise_id' => 'required'
        ]);

        $a = new Generate;
        $a->day = $request->day;
        $a->start = $request->start;
        $a->end = Carbon::parse($a->start)->addMinutes(45);
        $a->teacher_id = $request->teacher_id;
        $a->room_id = $request->room_id;
        $a->lesson_id = $request->lesson_id;
        $a->expertise_id = $request->expertise_id;
        $a->user_id = $request->user_id;
        $a->role_id = $request->role_id;
        $a->save();

        return back()->with('sweetalert', 'Berhasil Menambah Data Keahlian Jurusan');
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
