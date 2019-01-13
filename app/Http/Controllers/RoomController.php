<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\TypeRoom;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $index = Room::all();

    //     return view('curriculums.rooms.index', compact('index'));
    // }

    public function mix($typeroom)
    {
        $typeroom = TypeRoom::find($typeroom);

        return view('curriculums.rooms.index', compact('typeroom'));
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
            'code'          =>  'required|unique:rooms|max:5',
            'capacity'      =>  'required|numeric|digits:2',
            'type_room_id'  =>  'required',
        ]);

        $a = Room::create($store);

        return back()->with('sweetalert', 'Berhasil Menambah Data Ruang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($typeroomid)
    {
        $view = TypeRoom::find($typeroomid);

        $viewroom = Room::all();

        return view('majors.rooms.view', compact(['view', 'viewroom']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        // return view('curriculums.rooms.edit', compact('room'));
    }

    public function editmix($typeroom, $room)
    {
        $room = Room::find($room);

        return view('curriculums.rooms.edit', compact('room'));
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
        // dd($request);
        $this->validate($request, [
            'code'          =>  "required|unique:rooms,code,$id|max:5",
            'capacity'      =>  'required|numeric|digits:2',
        ]);

        $room = Room::findOrFail($id);
        $room->code = $request->code;
        $room->capacity = $request->capacity;
        $room->save();

        return back()->with('sweetalert', 'Berhasil Mengubah Data Ruang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return back();
    }
}
