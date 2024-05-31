<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaModel;
use App\Models\User;
use App\Models\KotaHasUser;
use App\Models\KotaHasUserModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class KotaController extends Controller
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
        $kotas = KotaModel::with('users')->get();

        return view('kota.index', compact('kotas'));
    }
    
    public function create()
    {
        $users = User::all();
        
        return view('kota.create', compact('users'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required',
            'judul' => 'required',
            'kelas' => 'required', 
            'periode' => 'required',
            'user_ids' => 'required|array|min:3',
            'user_ids.*' => 'exists:tbl_user,id_user'
        ]);
        
        $kota = KotaModel::create($request->only('nama_kota', 'judul', 'kelas', 'periode'));

        foreach ($request->user_ids as $user_id) {
            KotaHasUserModel::create([
                'id_kota' => $kota->id_kota,
                'id_user' => $user_id,
            ]);
        }
        
        return redirect()->route('kota')->with('success', 'Data Kota berhasil disimpan');
    }
    
    public function detail($id)
    {
        $kota = KotaModel::with('users')->findOrFail($id);
        
        return view('kota.detail', compact('kota'));
    }

    
    public function edit($id)
    {
        $kota = KotaModel::with('users')->findOrFail($id);
        $users = User::all();

        if (!$kota) {
            return redirect()->route('kota')->withErrors('Data tidak ditemukan.');
        }
        
        return view('kota.edit', compact('kota', 'users'));
    }

    public function update(Request  $request, $id)
    {
        $kota = KotaModel::findOrFail($id);

        $request->validate([
            'nama_kota' => 'required',
            'judul' => 'required',
            'kelas' => 'required', 
            'periode' => 'required',
            'user_ids' => 'required|array|min:3',
            'user_ids.*' => 'exists:tbl_user,id_user'
        ]);
        
        // Mengambil data kota berdasarkan id
        $kota->update($request->only('nama_kota', 'judul', 'kelas', 'periode'));

        // Update user di kota
        KotaHasUserModel::where('id_kota', $kota->id_kota)->delete();

        foreach ($request->user_ids as $user_id) {
            KotaHasUserModel::create([
                'id_kota' => $kota->id_kota,
                'id_user' => $user_id,
            ]);
        }

        // Redirect ke halaman kota.index dengan pesan sukses
        return redirect()->route('kota')->with('success', 'Data Kota berhasil diperbarui');
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan judul kota
        $kotas = KotaModel::where('id_kota', 'LIKE', "%$keyword%")->get();

        return view('kota.index', compact('kotas'));
    }
    
    public function destroy($id)
    {
        $kota = KotaModel::findOrFail($id);
        KotaHasUserModel::where('id_kota', $kota->id_kota)->delete();
        // Storage::delete('/kota'. $kota->id_kota);
        $kota->delete();

        
        return redirect()->route('kota')->with('success', 'Data Kota berhasil dihapus');
    }
}
