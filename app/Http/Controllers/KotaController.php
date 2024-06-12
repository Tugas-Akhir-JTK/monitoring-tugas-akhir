<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaModel;
use App\Models\User;
use App\Models\KotaHasUserModel;
use App\Models\KotaHasArtefakModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

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
    // public function index()
    // {
    //     $kotas = KotaModel::with('users')->paginate(10);

    //     return view('kota.index', compact('kotas'));
    // }

    public function index(Request $request)
    {
        $query = KotaModel::query();

        if ($request->has('sort') && $request->has('value')) {
            $sort = $request->input('sort');
            $value = $request->input('value');
            
            // Tambahkan filter berdasarkan nilai yang dipilih
            $query->where($sort, $value);
        }

        // Tambahkan logika sorting berdasarkan parameter 'sort' dan 'direction'
        if ($request->has('sort') && $request->has('direction')) {
            $query->orderBy($request->input('sort'), $request->input('direction'));
        }

        $kotas = $query->paginate(10);

        return view('kota.index', compact('kotas'));
    }


    
    public function create()
    {
        $dosen = User::where('role', 2)->get();
        $mahasiswa = User::where('role', 3)->get();
        
        return view('kota.create', compact('dosen', 'mahasiswa'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required',
            'judul' => 'required',
            'kelas' => 'required', 
            'periode' => 'required',
            'mahasiswa' => 'required|array|min:1|max:3',
            'dosen' => 'required|array|min:2|max:2',
        ]);
        
        
        $existingKota = DB::table('tbl_kota')->where('nama_kota', $request->nama_kota)->exists();
        if($existingKota) {
            session()->flash('error', 'Nomor KoTA sudah terdaftar');
            return redirect()->back()->withInput();
        }
        
        // $existingMahasiswa = DB::table('tbl_kota_has_user')->where('id_user', $request->mahasiswa)->exists();
        // if($existingMahasiswa) {
        //     session()->flash('error', 'Salah satu atau lebih mahasiswa sudah terdaftar di KoTA lain');
        //     return redirect()->back()->withInput();
        // }

        $kota = KotaModel::create($request->only('nama_kota', 'judul', 'kelas', 'periode'));
        $id_kota = $kota->id_kota;
        
        $userIds = array_merge($request->dosen, $request->mahasiswa);
        $data_array = count($userIds);

        for ($i=0; $i < $data_array ; $i++) { 
            $anggota = $userIds[$i];
            $id_user = DB::select("SELECT id FROM users WHERE nomor_induk='$anggota'");
            DB::table('tbl_kota_has_user')->insert([
                'id_kota' => $id_kota,
                'id_user' => $id_user[0]->id
            ]);
        }
        
        session()->flash('success', 'Data KoTA berhasil disimpan');
        
        return redirect()->route('kota');
    }
    
    public function detail($id)
    {
        $kota = KotaModel::with('users')->findOrFail($id);
        $dosen = $kota->users->where('role', 2);
        $mahasiswa = $kota->users->where('role', 3);

        $masterArtefaks = DB::table('tbl_master_artefak')->get();
        $artefakKota = KotaHasArtefakModel::where('id_kota', $id)->get();


        // Inisialisasi array kosong untuk menyimpan artefak sesuai dengan tahapan
        $seminar1 = [];
        $seminar2 = [];
        $seminar3 = [];
        $sidang = [];

        // Looping untuk membagi artefak sesuai dengan tahapan
        foreach ($masterArtefaks as $artefak) {
            switch ($artefak->nama_artefak) {
                case 'FTA 01':
                case 'FTA 02':
                case 'FTA 03':
                case 'FTA 04':
                case 'FTA 05':
                case 'FTA 05a':
                case 'Proposal Tugas Akhir':
                    $seminar1[] = $artefak;
                    break;
                case 'FTA 06':
                case 'FTA 06a':
                case 'FTA 07':
                case 'FTA 08':
                case 'FTA 09':
                case 'FTA 09a':
                case 'Laporan Tugas Akhir':
                case 'SRS':
                case 'SDD':
                    $seminar2[] = $artefak;
                    break;
                case 'FTA 10':
                case 'FTA 11':
                case 'FTA 12':
                case 'Laporan Tugas Akhir':
                case 'SRS':
                case 'SDD':
                    $seminar3[] = $artefak;
                    break;
                case 'FTA 13':
                case 'FTA 14':
                case 'FTA 15':
                case 'FTA 16':
                case 'FTA 17':
                case 'FTA 18':
                case 'FTA 19':
                case 'Laporan Tugas Akhir':
                case 'SRS':
                case 'SDD':
                    $sidang[] = $artefak;
                    break;
                default:
                    break;
            }
        }
        
        return view('kota.detail', compact('kota', 'dosen', 'mahasiswa', 'seminar1', 'seminar2', 'seminar3', 'sidang', 'artefakKota'));
    }

    
    public function edit($id)
    {
        $kota = KotaModel::with('users')->findOrFail($id);
        $dosen = User::where('role', 2)->get();
        $mahasiswa = User::where('role', 3)->get();

        if (!$kota) {
            return redirect()->route('kota')->withErrors('Data tidak ditemukan.');
        }
        
        return view('kota.edit', compact('kota', 'dosen', 'mahasiswa'));
    }

    public function update(Request  $request, $id)
    {
        
        $request->validate([
            'nama_kota' => 'required',
            'judul' => 'required',
            'kelas' => 'required', 
            'periode' => 'required',
            'mahasiswa' => 'required|array|min:1',
            'dosen' => 'required|array|min:2',
        ]);
        
        // Mengambil data kota berdasarkan id
        $kota = KotaModel::findOrFail($id);
        $kota->update($request->only('nama_kota', 'judul', 'kelas', 'periode'));

        $userIds = array_merge($request->dosen, $request->mahasiswa);
        $kota->users()->sync($userIds);

        // Set flash message
        session()->flash('success', 'Data kota berhasil diubah');

        // Redirect ke halaman kota.index dengan pesan sukses
        return redirect()->route('kota');
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan nama kota
        // $kotas = KotaModel::where('nama_kota', 'like', '%' . $keyword . '%')->paginate(10);
        $kotas = DB::table('tbl_kota')->where('nama_kota', 'like', '%' . $keyword . '%')
            ->orwhere('judul', 'like', '%' . $keyword . '%')
            ->get();

        return view('kota.index', compact('kotas'));
    }
    
    public function destroy($id)
    {
        $kota = KotaModel::findOrFail($id);
        KotaHasUserModel::where('id_kota', $kota->id_kota)->delete();
        // Storage::delete('/kota'. $kota->id_kota);
        $kota->delete();

        // session()->flash('success', 'Data kota berhasil dihapus');

        
        return redirect()->route('kota')->with('toast_success', 'Data KoTA berhasil dihapus');
    }
}
