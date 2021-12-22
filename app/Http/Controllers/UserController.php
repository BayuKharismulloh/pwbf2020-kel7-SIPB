<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::all();
        $roles = Role::all();

        return view('user.create', compact('kecamatans', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tgl_lahir' => $request->tgl_lahir,
            'kecamatan_id' => $request->kecamatan_id,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil dibuat');
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
        $kecamatans = Kecamatan::all();
        $roles = Role::all();
        $user = User::find($id);

        return view('user.edit', compact('kecamatans', 'roles', 'user'));
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
        $pass = User::find($id)->password;
        if ($request->password) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tgl_lahir' => $request->tgl_lahir,
                'kecamatan_id' => $request->kecamatan_id,
                'role_id' => $request->role_id
            ]);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'tgl_lahir' => $request->tgl_lahir,
                'kecamatan_id' => $request->kecamatan_id,
                'role_id' => $request->role_id
            ]);
        }

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('success', 'Data User Berhasil Dihapus');
    }
}
