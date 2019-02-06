<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
    public function create()
    {
        $users = User::all();

        return view('curriculums.accounts.index', compact('users'));
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ]);

        $create = new User;
        $create->name = $request->name;        
        $create->username = $request->username;        
        $create->password = $request->password;        
        $create->role_id = $request->role_id;        
        $create->save();

        return redirect()->back()->with('sweetalert', 'Berhasil Menambah Akun');
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
        $edit = User::find($id);

        return view('curriculums.accounts.edit', compact('edit'));
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
            'username' => "required|unique:users,username,$id|string",
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ]);

        $create = User::findOrFail($id);
        $create->name = $request->name;        
        $create->username = $request->username;        
        $create->password = $request->password;        
        $create->role_id = $request->role_id;        
        $create->save();

        return redirect()->back()->with('sweetalert', 'Berhasil Mengubah Akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('sweetalert', 'Berhasil Menghapus Akun');
    }
}
