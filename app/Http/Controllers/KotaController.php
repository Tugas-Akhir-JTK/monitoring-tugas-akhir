<?php

namespace App\Http\Controllers;

use App\Models\KotaModel;
use App\Models\PeriodeModel;
use App\Models\TimelineUtamaModel;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     */
    public function index()
    {
        $timelines = TimelineUtamaModel::where('periode_id', 3)->orderBy('tanggal_mulai', 'asc')->get()->toArray();
        $kotas = KotaModel::where('periode_id', 3)->orderBy('nama_kota', 'asc')->get()->toArray();
        $dosens = User::select('id','role', 'nomor_induk', 'nama' )->where('role', 2)->get()->toArray();

        foreach($kotas as &$kota) {
            $kota['timeline'] = [];
            $kota['dospem1'] = [];
            $kota['dospem2'] = [];

            // mencari dospem
            foreach($dosens as $dosen) {
                if($dosen['id'] === $kota['dospem1_id']){
                    $kota['dospem1'] = [
                        'user_id' => $dosen['id'],
                        'nama' => $dosen['nama']
                    ];
                };

                if($dosen['id'] === $kota['dospem2_id']){
                    $kota['dospem2'] = [
                        'user_id' => $dosen['id'],
                        'nama' => $dosen['nama']
                    ];
                };

                if (!empty($kota['dospem1']) && !empty($kota['dospem2'])) {
                    break;
                }
            }

            // mencari progres timeline pada kota
            foreach($timelines as $timeline) {
                if($kota['timeline_utama_id'] == $timeline['id']) {
                    $kota['timeline'] = [
                        'timeline_utama_id' => $timeline['id'],
                        'nama_timeline' => $timeline['nama_timeline']
                    ];
                    break;
                }
            }
        }

        unset($kota);

        return view('kota.index', ['kotas' => $kotas]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = User::select('id','role', 'nomor_induk', 'nama' )->where('role', 2)->get();
        $mahasiswas = User::select('id','role', 'nomor_induk', 'nama' )->where('role', 3)->orderBy('nomor_induk', 'asc')->get();
        $periodes = PeriodeModel::all();
        
        return view('kota.create', ['dosens' => $dosens, 'mahasiswas' => $mahasiswas, 'periodes' => $periodes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'nama_kota' => 'required',
            'mahasiswa1' => 'required',
            'judul_tugas_akhir' => 'required',
            'kelas' => 'required', 
            'mitra_tugas_akhir' => 'required',
            'luaran_tugas_akhir' => 'required'
        ]);

        // cek apakah nama kota terdaftar
        $existingKota = KotaModel::where('periode_id', 3)->where('nama_kota', $request->nama_kota)->exists();
        if ($existingKota) {
            session()->flash('error', 'Gagal menambah KoTa, Nomor KoTA sudah terdaftar');
            return redirect()->back()->withInput();
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
