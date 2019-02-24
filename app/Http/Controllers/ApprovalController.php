<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\Generate;
use App\Models\Expertise;
use App\Models\Major;
use Auth;
use App;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function acc()
    {
        $appro = Generate::where('read', '=', 0)->update([
            'read' => 1
        ]);

        return redirect()->back()->with('sweetalert', 'Berhasil Menyetujui Jadwal');
    }
    
    public function approve(Request $request)
    {
        $approve = Approval::all();
        $generates = Generate::all();

        return view('headmasters.approval.index', compact(['approve','generates']));
    }

    public function create()
    {
        $gene = Generate::all()->groupBy('expertise_id');
        // dd($gene);
        $expertise = Expertise::all();
        $approve = Approval::all();

        return view('curriculums.approvals.index', compact(['gene', 'expertise', 'approve']));
    }

    public function showmajor($level, $major)
    {
        $mixcurriculum = Major::find($major);

        $read = Generate::where('major_id', 1)->where('role_id', 2)->update(['read' => 1]);

        return view('curriculums.approvals.showmajor', compact('mixcurriculum', 'read'));
    }

    public function approved($level, $major, $expertise)
    {
        $expertise = Expertise::find($expertise);

        $majors = Major::find($major);
        
        $generate = Generate::where('major_id', $major)->orWhereNull('major_id')->orderBy('start')->orderBy('day')->get();

        return view('curriculums.approvals.approved', compact('expertise', 'majors', 'generate'));
    }

    public function pdf($expertise)
    {
        $generate = Generate::where('expertise_id', $expertise)->orderBy('start')->orderBy('day')->get();

            // $expert = Expertise::all()->groupBy('name');
            // dd($expert->groupBy('name'));

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML(view('curriculums.approvals.pdf', compact('generate', 'expert', 'a')))->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function showexpertise(Request $request)
    {
        $expertise = $request->expertise;
        $tahun = $request->tahun;
        return redirect()->route('appr.create', compact('expertise', 'tahun'));
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
            'beginning' => 'required', 
            'end' => 'required', 
        ]);

        $create = new Approval;
        $create->beginning = $request->beginning;
        $create->end = $request->end;
        $create->status = 0;
        $create->user_id = Auth::user()->id;
        $create->save();

        $create->generates()->sync($request->generates, false);

        return redirect()->back()->with('sweetalert', 'Berhasil Menambah Data');
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
        $edit = Approval::find($id);

        $gener = Generate::all()->groupBy('expertise_id');

        $generates = Generate::all();

        $arr = array();

        foreach ($generates as $value) {
            $arr[$value->id] = $value->id;
        }


        return view('curriculums.approvals.edit', compact('edit','gener', 'generates', 'arr'));
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
            'beginning' => 'required', 
            'end' => 'required', 
        ]);

        $create = Approval::findOrFail($id);
        $create->beginning = $request->beginning;
        $create->end = $request->end;
        $create->status = 0;
        $create->user_id = Auth::user()->id;
        $create->save();

        $create->generates()->sync($request->generates);


        return redirect()->back()->with('sweetalert', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $approval = Approval::find($id);

        $approval->delete();

        return redirect()->back()->with('sweetalert', 'Berhasil Menghapus Data');
    }
}
