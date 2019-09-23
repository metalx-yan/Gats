<?php

namespace App\Http\Controllers;

use App;
use PDF;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherScheduleController extends Controller
{
	public function getSchedule(Request $request)
	{
		$teacher = Teacher::where('nip', $request->nip)->first();
		
		$pdf = App::make('dompdf.wrapper');

		$pdf->loadHTML(view('teacher.schedule', compact('teacher')))->setPaper('a4', 'landscape');

		return $pdf->stream();
	}
}
