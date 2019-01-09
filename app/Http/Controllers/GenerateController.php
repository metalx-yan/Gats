<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Expertise;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showgenexpert($level, $major, $expertise)
    {
        $showexpert = Expertise::find($expertise);
        
        return view('curriculums.generates.setup', compact(['showexpert']));
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
        //
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
