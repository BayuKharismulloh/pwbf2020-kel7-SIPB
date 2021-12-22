<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\DetailKorban;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
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
        if (Auth::user()->role_id == 3) {
            $pelaporans = Pelaporan::where('user_id', Auth::user()->id)->get();

            return view('pelaporan.index', compact('pelaporans'));
        } else {
            $pelaporans = Pelaporan::all();

            return view('pelaporan.index', compact('pelaporans'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bencanas = Bencana::all();

        return view('pelaporan.create', compact('bencanas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Pelaporan::create($data);

        return redirect()->route('pelaporan.index')->with('success', 'Laporan terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        $korbans = DetailKorban::where('pelaporan_id', $id)->get();

        return view('pelaporan.show', compact('pelaporan', 'korbans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $bencanas = Bencana::all();

        return view('pelaporan.edit', compact('pelaporan', 'bencanas'));
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
        $data = $request->all();

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Pelaporan::find($id)->update($data);

        return redirect()->route('pelaporan.index')->with('success', 'Laporan diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelaporan::find($id)->delete();

        return redirect()->back()->with('success', 'Laporan Dihapus');
    }

    public function validasi(Request $request, $id)
    {
        Pelaporan::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Laporan Terverifikasi');
    }

    public function detail(Request $request)
    {
        DetailKorban::create($request->all());
        
        return redirect()->back();
    }

    public function detailHapus($id)
    {
        DetailKorban::find($id)->delete();
        
        return redirect()->back();
    }
}
