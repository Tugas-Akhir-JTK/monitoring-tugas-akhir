<?php

namespace App\Http\Controllers;

use App\Models\KotaModel;
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

        foreach($kotas as &$kota) {
            $kota['timeline'] = [];

            foreach($timelines as $timeline) {
                if($kota['timeline_utama_id'] == $timeline['id']) {
                    $kota['timeline'] = [
                        'timeline_utama_id' => $timeline['id'],
                        'nama_timeline' => $timeline['nama_timeline']
                    ];
                    break;
                }
            }

            unset($kota);
        }

        return view('kota.index', ['kotas' => $kotas]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = User::where('role', 2)->get();
        $mahasiswa = User::where('role', 3)->get();
        
        return view('kota.create', compact('dosen', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
