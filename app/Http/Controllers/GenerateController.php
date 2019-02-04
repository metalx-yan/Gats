<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Expertise;
use App\Models\Major;
use Carbon\Carbon;
use App\Models\TypeLesson;
use Auth;
use App\Models\Generate;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showgen($level, $major, $expertise, $gen)
    {
        $showexpert = Expertise::find($gen);
        $major1 = Teacher::all();
        $generate = Generate::orderBy('start')->get();
        if (Auth::user()->role->id == 1) {
            $gens = Generate::where('major_id', $major)->orWhereNull('major_id')->orderBy('day')->get();
        }else {
            $gens = Generate::where('user_id', Auth::user()->id)->where('role_id', Auth::user()->role->id)->where('major_id', $major)->orWhereNull('major_id')->orderBy('day')->get();

        }
        return view('curriculums.generates.create', compact(['showexpert', 'major1', 'gens','generate']));
    }

    public function showmix($level, $major)
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
        if ($request->lesson_id == 3) {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'major_id' => 'required'
            ]);

            $sesi = 30 ;
            $create = new Generate;
            $create->day = $request->day;
            $create->start = $request->start;
            $create->end = Carbon::parse($request->start)->addMinutes($sesi);
            $create->user_id = Auth::user()->id;
            $create->role_id = Auth::user()->role->id;
            $create->major_id = $request->major_id;
            $create->save();
        } else {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'teacher_id' => 'required',
                'room_id' => 'required',
                'lesson_id' => 'required',
                'major_id' => 'required'
            ]);
            
            if ($request->start != '07:00:00') {
                $carbon = Carbon::parse($request->start)->subMinutes(45)->format('H:i:s');
                $ada = Generate::where('day', $request->day)->whereBetween('start', [$carbon, $request->start])->first();
                if (is_null($ada)) {
                    return redirect()->back()->with('sweetalerterror', 'Maaf!! Jam Sebelumnya Tidak Boleh Kosong');
                } else {                    
                    $sesi = 45 * $request->sesi;
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
                }
            } else {
                $start = Carbon::parse($request->start)->subMinutes(45);
                $s = Generate::where('start', $start)->first();
                $sesi = 45 * $request->sesi;
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
            }
        }

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

    public function editgen($level, $major, $expertise, $generate)
    {
        $edit = Generate::find($generate);
        $major1 = Major::all();
        $gens = Generate::where('role_id', Auth::user()->role->id)->orWhereNull('major_id')->orderBy('day')->orderBy('start')->get() ;
        return view('curriculums.generates.edit', compact(['edit','major1', 'gens']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $edit = Generate::find($id);
        // return view('curriculums.generates.edit', compact('edit'));
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
        $current = Generate::find($id);
        if ($current->jamPelajaran()) {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'teacher_id' => 'required',
                'room_id' => 'required',
                'lesson_id' => 'required',
                'major_id' => 'required'
            ]);

            $update = Generate::findOrFail($id);
            $update->major_id = $request->major_id;
            $update->teacher_id = null;
            $update->room_id = null;
            $update->lesson_id = null;
            $update->user_id = Auth::user()->id;
            $update->role_id = Auth::user()->role->id;
            $update->save();

            $sesi = 45 * $request->sesi;
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
        } else if($current->jamKosong()) {
            $update = Generate::findOrFail($id);
            $update->teacher_id = $request->teacher_id;
            $update->room_id = $request->room_id;
            $update->lesson_id = $request->lesson_id;
            $update->major_id = $request->major_id;
            $update->user_id = Auth::user()->id;
            $update->role_id = Auth::user()->role->id;
            $update->save();
        } else if($current->istirahat()) {
            $start = Carbon::parse(substr($request->start, 0, 8));
            $type = TypeLesson::find($request->lesson_id);
            $target = Generate::where('day', $request->day)
                        ->where('start', $start)
                        ->where('role_id', Auth::user()->role->id)
                        ->where('major_id', $current->major->id)
                        ->first();
            if ($target->jamKosong()) {
                $end = Carbon::parse($current->start)->subMinutes(15)->format('H:i:s');
                $new = Carbon::parse($target->end)->subMinutes(15)->format('H:i:s');
                $target->update([
                    'end' => $new
                ]);
                $current->update([
                    'start' => $end
                ]);
                $between = Generate::where('role_id', Auth::user()->role->id)
                            ->where('day', 'senin')
                            ->where('major_id', $current->major->id)
                            ->whereBetween('start', [$new, $end])
                            ->get();
                foreach ($between as $updated) {
                    if ($updated->id != $current->id) {
                        $a = Carbon::parse($updated->start)->subMinutes(15)->format('H:i:s');
                        $b = Carbon::parse($updated->end)->subMinutes(15)->format('H:i:s');
                        $updated->update([
                            'start' => $a,
                            'end' => $b
                        ]);
                    }
                }
            }
        }

        return redirect()->route('showmix.generate', [$current->major->level->id, $current->major->id])->with('sweetalert', 'Berhasil Mengubah Data Atur Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generate = Generate::find($id);

        $generate->delete();

        return redirect()->back()->with('sweetalert', 'Berhasil Menghapus Data Atur Jadwal');
    }
}
