<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\TypeTeacher;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Generate;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $index = Teacher::all();

        // return view('curriculums.teachers.index', compact('index'));
    }

    public function mix($typeteacherid)
    {
        $mix = TypeTeacher::find($typeteacherid);

        $teacher = Generate::all();
        return view('curriculums.teachers.index', compact('mix', 'teacher'));
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
        // dd($request->all());
        $store = $request->validate([
            'nip'               =>  'required|unique:teachers',
            'lesson'              =>  'required',
            'name'              =>  'required',
            'status'            =>  'required',
            'time'          =>  'required',
            'type_teacher_id'   =>  'required',
            // 'username'          =>  'required|unique:users',
            // 'password'          =>  'required|string|min:6|confirmed',

        ]);

        $a = Teacher::create($store);

        return back()->with('sweetalert', 'Berhasil Menambah Data Guru');
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

    public function view($typeteacherid)
    {
        $view = TypeTeacher::find($typeteacherid);

        $viewteacher = Teacher::all();

        return view('majors.teachers.view', compact(['view', 'viewteacher']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        // return view('curriculums.teachers.edit', compact('teacher'));
    }

    public function editmix($typeteacher, $teacher)
    {
        $teacher = Teacher::find($teacher);
        
        return view('curriculums.teachers.edit', compact('teacher'));
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
        $this->validate($request, [
            'nip'       =>  "required|unique:teachers,nip,$id|numeric|digits:18",
            'code'      =>  "required|unique:teachers,code,$id|string|max:5", 
            'name'      =>  'required',
            'status'    =>  'required'
        ]);
        $teacher = Teacher::findOrFail($id);
        $teacher->nip = $request->nip;
        $teacher->code = $request->code;
        $teacher->name = $request->name;
        $teacher->status = $request->status;
        $teacher->save();

        return back()->with('sweetalert', 'Berhasil Mengubah Data Guru');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $a = $teacher->delete();

        return back()->with('sweetalert', 'Berhasil Menghapus Data Guru');
    }
}
