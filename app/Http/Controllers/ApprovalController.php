<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\Generate;
use App\Models\Expertise;
use Auth;

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
    public function approve()
    {
        $approve = Approval::all();
        $generates = Generate::where('major_id');

        return view('headmasters.approval.index', compact(['approve','generates']));
    }

    public function create()
    {
        $gene = Generate::all()->groupBy('major_id');
        $expertise = Expertise::all();
        $approve = Approval::all();

        return view('curriculums.approvals.index', compact(['gene', 'expertise', 'approve']));
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
        $expertise = Expertise::all();
        
        $generates = Generate::all();

        $arr = array();

        foreach ($generates as $value) {
            $arr[$value->id] = $value->id;
        }


        return view('curriculums.approvals.edit', compact('edit','expertise', 'generates', 'arr'));
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
