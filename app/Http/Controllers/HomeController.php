<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KotaModel;
use App\Models\ResumeBimbinganModel;
use App\Models\KotaHasTahapanProgresModel;
use App\Models\KotaHasArtefakModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == '1') {
                $jumlahBimbinganPerKota = $this->getJumlahBimbinganPerKota();
                return view('beranda.koordinator.home', compact('jumlahBimbinganPerKota'));
            } elseif ($role == '3') {
                $user = auth()->user();

                // Query untuk mendapatkan kota yang terkait dengan mahasiswa
                $kotas = KotaModel::whereHas('users', function ($q) use ($user) {
                    $q->where('id_user', $user->id)->where('role', 3); // Filter hanya role 3 (mahasiswa)
                })->get();
                $dosen = $kotas->flatMap->users->where('role', 2);
                $mahasiswa = $kotas->flatMap->users->where('role', 3);
                // $kotaIds = $kotas->pluck('id'); 
                $id_kota = DB::table('tbl_kota_has_user')
                            ->where('id_user', $user->id)
                            ->value('id_kota');

                // Menghitung progress tahapan bimbingan
                $progressStage1Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                            ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                                                            ->where('tahapan_progres', '2')
                                                            ->count();
                $progressStage2Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                            ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                                                            ->where('tahapan_progres', '3')
                                                            ->count();
                $progressStage3Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                                                            ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                                                            ->where('tahapan_progres', '4')
                                                            ->count();

                // Menyiapkan data artefak untuk ditampilkan
                $masterArtefaks = DB::table('tbl_master_artefak')->get();
                $artefakKota = KotaHasArtefakModel::where('id_kota', $id_kota)->get();
                $tahapan_progres = KotaHasTahapanProgresModel::where('id_kota',$id_kota)->get();

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

                return view('beranda.mahasiswa.home', compact('kotas', 'progressStage1Count', 'progressStage2Count', 'progressStage3Count', 'dosen', 'mahasiswa', 'seminar1', 'seminar2', 'seminar3', 'sidang', 'artefakKota','tahapan_progres'));
            }
        }

        $query = KotaModel::query();
        $user = auth()->user();
    
        if ($user->role == 2) {
            // Query KOTA berdasarkan user yang sedang terautentikasi dan role = 2
            $query = KotaModel::whereHas('users', function ($q) use ($user) {
                $q->where('id_user', $user->id);
            });
    
            // Lakukan join dengan tabel tahapan_progres dan master_tahapan_progres
            $query->leftJoin('tbl_kota_has_tahapan_progres', 'tbl_kota.id_kota', '=', 'tbl_kota_has_tahapan_progres.id_kota')
                    ->leftJoin('tbl_master_tahapan_progres', 'tbl_kota_has_tahapan_progres.id_master_tahapan_progres', '=', 'tbl_master_tahapan_progres.id')
                    ->select('tbl_kota.*', 'tbl_master_tahapan_progres.nama_progres AS nama_tahapan', 'tbl_kota_has_tahapan_progres.status AS status')
                    ->where(function ($query) {
                        $query->where('tbl_kota_has_tahapan_progres.status', 'on_progres')
                                ->orWhere('tbl_kota_has_tahapan_progres.status', 'disetujui');
                    })
                    ->first();

        }
    
        if ($request->has('sort') && $request->has('value')) {
            $sort = $request->input('sort');
            $value = $request->input('value');
    
            $query->where($sort, $value);
        }
    
        // Tambahkan logika sorting berdasarkan parameter 'sort' dan 'direction'
        if ($request->has('sort') && $request->has('direction')) {
            $query->orderBy($request->input('sort'), $request->input('direction'));
        }
    
        $kotas = $query->paginate(10);
    
        if ($user->role == 2) {
            return view('beranda.pembimbing.home', compact('kotas'));
        } elseif ($user->role == 4) {
            $query = KotaModel::query();

            // Menambahkan filter berdasarkan parameter 'sort' dan 'value'
            if ($request->has('sort') && $request->has('value')) {
                $sort = $request->input('sort');
                $value = $request->input('value');

            $values = explode(',', $value);
            // Menghapus spasi putih di sekitar nilai
            $values = array_map('trim', $values);

            // Memastikan array tidak kosong sebelum menggunakan whereIn
            if (count($values) > 0) {
                $query->whereIn($sort, $values);
            }

                // Menggunakan whereIn untuk filter berdasarkan nilai yang dipilih
                $query->whereIn($sort, $values);
            }

            // Menambahkan logika sorting berdasarkan parameter 'sort' dan 'direction'
            if ($request->has('sort') && $request->has('direction')) {
                $sort = $request->input('sort');
                $direction = $request->input('direction');
    
                if (in_array($direction, ['asc', 'desc'])) {
                    $query->orderBy($sort, $direction);
                }
            }

            $kotas = $query->get();
            $luaranCounts = $this->getLuaranData($kotas);
            $mitraCounts = $this->getMitraCounts($kotas);
            return view('beranda.kaprodi.home', compact('luaranCounts', 'mitraCounts', 'kotas'));
        }
    
    }

    private function getLuaranData($filteredKotas = null){
        $kotaData = $filteredKotas ?? KotaModel::select('luaran')->get();
        $luaranCounts = [
            'HKI' => 0,
            'UAT' => 0,
            'Jurnal' => 0
        ];

        foreach ($kotaData as $kota) {
            if (strpos($kota->luaran, 'HKI') !== false) {
                $luaranCounts['HKI']++;
            }
            if (strpos($kota->luaran, 'UAT') !== false) {
                $luaranCounts['UAT']++;
            }
            if (strpos($kota->luaran, 'Jurnal') !== false) {
                $luaranCounts['Jurnal']++;
            }
        }

        return $luaranCounts;
    }

    private function getMitraCounts($filteredKotas = null)
    {
        // Ambil semua data Kota
        $kotaData = $filteredKotas ?? KotaModel::select('luaran')->get();
    
        // Inisialisasi array untuk menyimpan jumlah kota per kategori mitra
        $mitraCounts = [
            'Non-mitra' => 0,
            'Organisasi' => 0,
            'Industri' => 0
        ];
    
        // Perulangan untuk menghitung jumlah kota berdasarkan kategori mitra
        foreach ($kotaData as $kota) {
            if ($kota->mitra === 'Non-mitra') {
                $mitraCounts['Non-mitra']++;
            } elseif ($kota->mitra === 'Organisasi') {
                $mitraCounts['Organisasi']++;
            } elseif ($kota->mitra === 'Industri') {
                $mitraCounts['Industri']++;
            }
        }
    
        return $mitraCounts;
    }
    private function getJumlahBimbinganPerKota(){
        $kotas = KotaModel::all();
        $jumlahBimbinganPerKota = [];
    
        foreach ($kotas as $kota) {
            $id_kota = $kota->id_kota;
            
            $progressStage2Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                ->where('tahapan_progres', '2')
                ->count();
            $progressStage3Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                ->where('tahapan_progres', '3')
                ->count();
            $progressStage4Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                ->where('tahapan_progres', '4')
                ->count();
    
            $jumlahBimbingan = $progressStage2Count + $progressStage3Count + $progressStage4Count;
    
            $jumlahBimbinganPerKota[] = [
                'kota' => $kota->nama_kota,
                'kelas' => $kota->kelas,
                'jumlah_bimbingan' => $jumlahBimbingan
            ];
        }
    
        return $jumlahBimbinganPerKota;
    }
}
