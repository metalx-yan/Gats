<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expertise;
use App\Models\Major;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $index = Expertise::all();

    //     return view('curriculums.expertises.index', compact('index'));
    // }

    public function mix($level, $major)
    {
        $major = Major::find($major);
        
        return view('curriculums.expertises.index', compact(['major']));
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
        $store = $request->validate([
            'code'          =>  'required|unique:lessons|between:2,5',
            'name'          =>  'required',
            'major_id'      =>  'required'
        ]);

        $a = Expertise::create($store);

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
