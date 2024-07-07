<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatanModel;
use App\Models\JadwalKesediaanPengujiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jadwals = JadwalKesediaanPengujiModel::all();
        return view('jadwal.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $data = [
            'nama_penguji' => $request->nama_penguji,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ];

        if($request->tanggal_selesai <= $request->tanggal_mulai) {
            session()->flash('error', 'Range tanggal tidak valid');
            return redirect()->back()->withInput();
        }
    
        JadwalKesediaanPengujiModel::create($data);
    
        return redirect()->back()->with('success', 'Data jadwal berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penguji' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if($request->tanggal_selesai <= $request->tanggal_mulai) {
            session()->flash('error', 'Range tanggal tidak valid');
            return redirect()->back()->withInput();
        }

        $jadwal = JadwalKesediaanPengujiModel::findOrFail($id);

        $jadwal->update($request->all());

        return redirect()->route('jadwal')->with('success', 'Data jadwal berhasil dirubah');
    }

    public function destroy($id)
    {
        $jadwal = JadwalKesediaanPengujiModel::findOrFail($id);
        JadwalKesediaanPengujiModel::where('id_jadwal', $jadwal->id_jadwal)->delete();
        // Storage::delete('/jadwal'. $jadwal->id_jadwal);
        $jadwal->delete();

        return redirect()->route('jadwal')->with('success', 'Data jadwal berhasil dihapus');
    }
}
