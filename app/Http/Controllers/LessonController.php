<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Lesson::all();

        return view('curriculums.lessons.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //except
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
            'code'          =>  'required|unique:lessons|numeric|digits:4',
            'name'          =>  'required',
            'total_hours'   =>  'required|numeric|digits:1',
            'semester'      =>  'required|min:6|max:6',
            'beginning'     =>  'required',
            'end'           =>  'required'
        ]);

        $a = Lesson::create($store);

        return back()->with('sweetalert', 'Berhasil Menambah Data Mata Pelajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //except
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('curriculums.lessons.edit', compact('lesson'));
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
        $store = $request->validate([
            'code'          =>  "required|unique:lessons,code,$id|numeric|digits:4",
            'name'          =>  'required',
            'total_hours'   =>  'required|numeric|digits:1',
            'semester'      =>  'required|min:6|max:6',
            'beginning'     =>  'required',
            'end'           =>  'required'
        ]);

        $store = Lesson::findOrFail($id);
        $store->code        = $request->code;
        $store->name        = $request->name;
        $store->total_hours = $request->total_hours;
        $store->semester    = $request->semester;
        $store->beginning   = $request->beginning;
        $store->end         = $request->end;
        $store->save();

        return back()->with('sweetalert', 'Berhasil Mengubah Data Mata Pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return back()->with('sweetalert', 'Berhasil Menghapus Data Mata Pelajaran');
    }
}
