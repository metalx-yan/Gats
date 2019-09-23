<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Major;
use App\Models\Teacher;
use App\Models\User;
use App\Models\TypeLesson;
use Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $index = Lesson::all();

    //     return view('curriculums.lessons.index', compact('index'));
    // }

    public function mix($typelesson)
    {
        $typelesson = TypeLesson::find($typelesson);

        $majors = Major::all();

        $users = User::all();

        $teachers = Teacher::all();
     
        return view('curriculums.lessons.index', compact(['typelesson', 'majors', 'teachers', 'users']));
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
            'code'              =>  'required|unique:lessons|max:6',
            'name'              =>  'required',
            'semester'          =>  'required',
            'users'             =>  'required',
            'majors'            =>  'required',
            'time'          =>  'required',
            'type_lesson_id'    =>  'required',
        ]);

        $a = Lesson::create($store);
        $a->majors()->sync($request->majors, false);

        $a->users()->sync($request->users, false);

        $a->teachers()->sync($request->teachers, false);

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

    public function view($typelesson)
    {
        $view = Auth::user();
        
        return view('majors.lessons.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        // return view('curriculums.lessons.edit', compact('lesson'));
    }

    public function editmix($typelesson, $lesson)
    {

        $lesson = Lesson::find($lesson);
        
        $majors = Major::all();

        $majors2 = array();

        foreach ($majors as $major) {
            $majors2[$major->id] = $major->name;
        }

        $users = User::where('role_id', 2)->get();

        $user = array();

        foreach ($users as $user) {
            $user[$user->id] = $user->name;
        }
        
        $teachers = Teacher::all();

        $teacher = array();

        foreach ($teachers as $teacher) {
            $teacher[$teacher->id] = $teacher->name;
        }

        return view('curriculums.lessons.edit', compact(['lesson', 'majors', 'majors2', 'users', 'user', 'teachers', 'teacher']));
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
        $update = $request->validate([
            'code'               =>  "required|unique:lessons,code,$id|between:2,8",
            'name'               =>  'required',
            'semester'           =>  'required',
            'type_lesson_id'     =>  'required',
        ]);

        $update = Lesson::findOrFail($id);
        $update->code                    = $request->code;
        $update->name                    = $request->name;
        $update->semester                = $request->semester;
        $update->type_lesson_id          = $request->type_lesson_id;
        $update->save();

        $update->majors()->sync($request->majors);
        $update->users()->sync($request->users);
        $update->teachers()->sync($request->teachers);
        

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
        $a = $lesson->delete();
        return back()->with('sweetalert', 'Berhasil Menghapus Data Mata Pelajaran');
    }
}
