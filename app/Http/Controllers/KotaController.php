<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaModel;
use App\Models\User;
use App\Models\KotaHasUserModel;
use App\Models\KotaHasArtefakModel;
use App\Models\KotaHasTahapanProgresModel;
use App\Models\MasterArterfakModel;
use App\Models\ResumeBimbinganModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Illuminate\Support\Facades\Log;


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

    public function index(Request $request)
    {
         // Query awal untuk mengambil data dari KotaModel
        $query = KotaModel::query();

        // Menambahkan filter berdasarkan parameter 'sort' dan 'value'
        if ($request->has('sort') && $request->has('value')) {
            $sort = $request->input('sort');
            $value = $request->input('value');
            
            // Tambahkan filter berdasarkan nilai yang dipilih
            $query->where($sort, $value);
        }

        // Menambahkan logika sorting berdasarkan parameter 'sort' dan 'direction'
        if ($request->has('sort') && $request->has('direction')) {
            $query->orderBy($request->input('sort'), $request->input('direction'));
        }

    // Lakukan join dengan tabel tahapan_progres dan master_tahapan_progres
    $query->leftJoin('tbl_kota_has_tahapan_progres', 'tbl_kota.id_kota', '=', 'tbl_kota_has_tahapan_progres.id_kota')
                    ->leftJoin('tbl_master_tahapan_progres', 'tbl_kota_has_tahapan_progres.id_master_tahapan_progres', '=', 'tbl_master_tahapan_progres.id')
                    ->select('tbl_kota.*', 'tbl_master_tahapan_progres.nama_progres AS nama_tahapan', 'tbl_kota_has_tahapan_progres.status AS status')
                    ->where(function ($query) {
                        $query->where('tbl_kota_has_tahapan_progres.status', 'on_progres')
                                ->orWhere('tbl_kota_has_tahapan_progres.status', 'disetujui');
                    })
                    ->first();
   
    $kotas = $query->get();



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
        
        // Check if the Kota already exists
        $existingKota = DB::table('tbl_kota')->where('nama_kota', $request->nama_kota)->exists();
        if ($existingKota) {
            session()->flash('error', 'Nomor KoTA sudah terdaftar');
            return redirect()->back()->withInput();
        }
        
        // Check if user with role '3' already has a Kota
        $userIds = array_merge($request->dosen, $request->mahasiswa);
        foreach ($userIds as $userId) {
            $userRole = DB::table('users')->where('nomor_induk', $userId)->value('role');
            $userid = DB::table('users')->where('nomor_induk', $userId)->value('id');
            if ($userRole == '3') {
                $existingUserKota = DB::table('tbl_kota_has_user')
                                    ->where('id_user', $userid)
                                    ->exists();
                if ($existingUserKota) {
                    session()->flash('error', 'Mahsiswa dengan NIM' . $userId . ' sudah memiliki kota.');
                    return redirect()->back()->withInput();
                }
            }
        }
        
        // Create Kota
        $kota = KotaModel::create($request->only('nama_kota', 'judul', 'kelas', 'periode'));
        $id_kota = $kota->id_kota;
        
        // Save Mahasiswa and Dosen to tbl_kota_has_user
        foreach ($userIds as $userId) {
            $id_user = DB::table('users')->where('nomor_induk', $userId)->value('id');
            DB::table('tbl_kota_has_user')->insert([
                'id_kota' => $id_kota,
                'id_user' => $id_user
            ]);
        }
        
        // Tambahkan data ke tabel tbl_kota_has_tahapan_progres
        $initialTahapanProgres = [
            ['id_master_tahapan_progres' => 1, 'status' => 'on_progres'],
            ['id_master_tahapan_progres' => 2, 'status' => 'belum-disetujui'],
            ['id_master_tahapan_progres' => 3, 'status' => 'belum-disetujui'],
            ['id_master_tahapan_progres' => 4, 'status' => 'belum-disetujui']
        ];
        
        foreach ($initialTahapanProgres as $tahapan) {
            $tahapan['id_kota'] = $id_kota;
            DB::table('tbl_kota_has_tahapan_progres')->insert($tahapan);
        }
        
        session()->flash('success', 'Data KoTA berhasil disimpan');
        return redirect()->route('kota');
        
        
    }
    
    public function detail($id)
    {
        $progressStage2Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                    ->where('tbl_kota_has_resume_bimbingan.id_kota', $id)
                                                    ->where('tahapan_progres', '2')
                                                    ->count();
        $progressStage3Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                    ->where('tbl_kota_has_resume_bimbingan.id_kota', $id)
                                                    ->where('tahapan_progres', '3')
                                                    ->count();
        $progressStage4Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                    ->where('tbl_kota_has_resume_bimbingan.id_kota', $id)
                                                    ->where('tahapan_progres', '4')
                                                    ->count();
        $kota = KotaModel::with('users')->findOrFail($id);
        $dosen = $kota->users->where('role', 2);
        $mahasiswa = $kota->users->where('role', 3);

        $mastertahapan = DB::table('tbl_master_tahapan_progres')->get();
        $tahapan_progres = KotaHasTahapanProgresModel::where('id_kota', $id)->get();


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
        

        return view('kota.detail', compact('kota', 'progressStage4Count', 'progressStage2Count', 'progressStage3Count', 'dosen', 'mahasiswa', 'seminar1', 'seminar2', 'seminar3', 'sidang', 'artefakKota', 'mastertahapan', 'tahapan_progres'));
    }

    // public function store_status(Request $request)
    // {
    //     $status = $request->input('status');
    //     $id_kota = $request->input('id_kota');
    //     $id_master_tahapan_progres = $request->input('id_master_tahapan_progres');

    //     // \Log::info('Data received', [
    //     //     'status' => $status,
    //     //     'id_kota' => $id_kota,
    //     //     'id_master_tahapan_progres' => $id_master_tahapan_progres
    //     // ]);
        
    //     $kotaTahapanProgres = KotaHasTahapanProgresModel::where('id_kota', $id_kota)
    //                                                      ->where('id_master_tahapan_progres', $id_master_tahapan_progres)
    //                                                      ->first();
    
    //     if ($kotaTahapanProgres) {
    //         $kotaTahapanProgres->status = $status;
    //         $kotaTahapanProgres->save();
    //     }
    
    //     return redirect()->back();

        public function store_status(Request $request)
    {
        $status = $request->input('status');
        $id_kota = $request->input('id_kota');
        $id_master_tahapan_progres = $request->input('id_master_tahapan_progres');
    
        // Cari tahapan progres saat ini
        $kotaTahapanProgres = KotaHasTahapanProgresModel::where('id_kota', $id_kota)
            ->where('id_master_tahapan_progres', $id_master_tahapan_progres)
            ->first();

        if ($kotaTahapanProgres) {
            // Ubah status tahapan progres saat ini
            $kotaTahapanProgres->status = $status;
            $kotaTahapanProgres->save();
    
            // Jika statusnya 'selesai', ubah status data setelahnya menjadi 'on_progres'
            if ($status == 'selesai') {
                $nextTahapanProgres = KotaHasTahapanProgresModel::where('id_kota', $id_kota)
                                                                ->where('id_master_tahapan_progres', $id_master_tahapan_progres + 1)
                                                                ->first();
    
                if ($nextTahapanProgres) {
                    $nextTahapanProgres->status = 'on_progres';
                    $nextTahapanProgres->save();
                }
            }
        }
    
        return redirect()->back();
    }
    // }
    

    
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
            'nama_kota' => '',
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

        // Ambil nama kolom dari tabel
        $columns = DB::getSchemaBuilder()->getColumnListing('tbl_kota');

        // Buat query pencarian dinamis
        $query = DB::table('tbl_kota');
        
        foreach ($columns as $column) {
            $query->orWhere($column, 'like', '%' . $keyword . '%');
        }

        $kotas = $query->get();
        
        return view('kota.index', compact('kotas'));
    }
    
    public function destroy($id)
    {
        $kota = KotaModel::findOrFail($id);
        KotaHasUserModel::where('id_kota', $kota->id_kota)->delete();
        // Storage::delete('/kota'. $kota->id_kota);
        $kota->delete();

        session()->flash('success', 'Data kota berhasil dihapus');

        
        return redirect()->route('kota')->with('toast_success', 'Data KoTA berhasil dihapus');
    }
}
