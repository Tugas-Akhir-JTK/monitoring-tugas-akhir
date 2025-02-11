<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KotaModel;
use App\Models\ResumeBimbinganModel;
use App\Models\KotaHasTahapanProgresModel;
use App\Models\KotaHasArtefakModel;
use App\Models\KotaHasResumeBimbinganModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    
                // Pass data to the view
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

                // Menyiapkan data artefak untuk ditampilkan
                $masterArtefaks = DB::table('tbl_master_artefak')->get();
                $artefakKota = KotaHasArtefakModel::where('id_kota', $id_kota)
                                                    ->join('tbl_artefak', 'tbl_kota_has_artefak.id_artefak', '=', 'tbl_artefak.id_artefak')
                                                    ->select('tbl_artefak.nama_artefak')
                                                    ->get();
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
                $mastertahapan = DB::table('tbl_master_tahapan_progres')->get();

                // untur bar progres
                $artefak_dikumpulkan_1 = DB::table('tbl_artefak as ar')
                                            ->join('tbl_kota_has_artefak as kar', 'kar.id_artefak', '=', 'ar.id_artefak')
                                            ->where(function ($query) {
                                                $query->where('ar.nama_artefak', 'FTA 01')
                                                    ->orWhere('ar.nama_artefak', 'FTA 02')
                                                    ->orWhere('ar.nama_artefak', 'FTA 03')
                                                    ->orWhere('ar.nama_artefak', 'FTA 04')
                                                    ->orWhere('ar.nama_artefak', 'FTA 05')
                                                    ->orWhere('ar.nama_artefak', 'FTA 05a')
                                                    ->orWhere('ar.nama_artefak', 'Proposal Tugas Akhir');
                                            })
                                            ->where('id_kota', $id_kota)
                                            ->get()
                                            ->count();
                $artefak_dikumpulkan_2 = DB::table('tbl_artefak as ar')
                                            ->join('tbl_kota_has_artefak as kar', 'kar.id_artefak', '=', 'ar.id_artefak')
                                            ->where(function ($query) {
                                                $query->where('ar.nama_artefak', 'FTA 06')
                                                    ->orWhere('ar.nama_artefak', 'FTA 06a')
                                                    ->orWhere('ar.nama_artefak', 'FTA 07')
                                                    ->orWhere('ar.nama_artefak', 'FTA 08')
                                                    ->orWhere('ar.nama_artefak', 'FTA 09')
                                                    ->orWhere('ar.nama_artefak', 'FTA 09a')
                                                    ->orWhere('ar.nama_artefak', 'Laporan Tugas Akhir')
                                                    ->orWhere('ar.nama_artefak', 'SRS')
                                                    ->orWhere('ar.nama_artefak', 'SDD');
                                            })
                                            ->where('id_kota', $id_kota)
                                            ->get()
                                            ->count();
                $artefak_dikumpulkan_3 = DB::table('tbl_artefak as ar')
                                            ->join('tbl_kota_has_artefak as kar', 'kar.id_artefak', '=', 'ar.id_artefak')
                                            ->where(function ($query) {
                                                $query->where('ar.nama_artefak', 'FTA 10')
                                                    ->orWhere('ar.nama_artefak', 'FTA 11')
                                                    ->orWhere('ar.nama_artefak', 'FTA 12')
                                                    ->orWhere('ar.nama_artefak', 'Laporan Tugas Akhir')
                                                    ->orWhere('ar.nama_artefak', 'SRS')
                                                    ->orWhere('ar.nama_artefak', 'SDD');
                                            })
                                            ->where('id_kota', $id_kota)
                                            ->get()
                                            ->count();
                $artefak_dikumpulkan_4 = DB::table('tbl_artefak as ar')
                                            ->join('tbl_kota_has_artefak as kar', 'kar.id_artefak', '=', 'ar.id_artefak')
                                            ->where(function ($query) {
                                                $query->where('ar.nama_artefak', 'FTA 13')
                                                    ->orWhere('ar.nama_artefak', 'FTA 14')
                                                    ->orWhere('ar.nama_artefak', 'FTA 15')
                                                    ->orWhere('ar.nama_artefak', 'FTA 16')
                                                    ->orWhere('ar.nama_artefak', 'FTA 17')
                                                    ->orWhere('ar.nama_artefak', 'FTA 18')
                                                    ->orWhere('ar.nama_artefak', 'FTA 19')
                                                    ->orWhere('ar.nama_artefak', 'Laporan Tugas Akhir')
                                                    ->orWhere('ar.nama_artefak', 'SRS')
                                                    ->orWhere('ar.nama_artefak', 'SDD');
                                            })
                                            ->where('id_kota', $id_kota)
                                            ->get()
                                            ->count();
                $resume_bimbingan_1 = DB::table('tbl_resume_bimbingan as rb')
                                                ->join('tbl_kota_has_resume_bimbingan as krb', 'krb.id_resume_bimbingan', '=', 'rb.id_resume_bimbingan')
                                                ->where('krb.id_kota', $id_kota)
                                                ->where('rb.sesi_bimbingan', 1)
                                                ->count();
                $resume_bimbingan_2 = DB::table('tbl_resume_bimbingan as rb')
                                                ->join('tbl_kota_has_resume_bimbingan as krb', 'krb.id_resume_bimbingan', '=', 'rb.id_resume_bimbingan')
                                                ->where('krb.id_kota', $id_kota)
                                                ->where('rb.sesi_bimbingan', 2)
                                                ->count();
                $resume_bimbingan_3 = DB::table('tbl_resume_bimbingan as rb')
                                                ->join('tbl_kota_has_resume_bimbingan as krb', 'krb.id_resume_bimbingan', '=', 'rb.id_resume_bimbingan')
                                                ->where('krb.id_kota', $id_kota)
                                                ->where('rb.sesi_bimbingan', 3)
                                                ->count();
                $resume_bimbingan_4 = DB::table('tbl_resume_bimbingan as rb')
                                                ->join('tbl_kota_has_resume_bimbingan as krb', 'krb.id_resume_bimbingan', '=', 'rb.id_resume_bimbingan')
                                                ->where('krb.id_kota', $id_kota)
                                                ->where('rb.sesi_bimbingan', 4)
                                                ->count();
                $jml_perlu_dikumpulkan_1 = 12; // artefak 7 & bimbingan 5
                $jml_sudah_dikumpulkan_1 = $artefak_dikumpulkan_1 + ($resume_bimbingan_1 > 5 ? 5 : $resume_bimbingan_1);
                $jml_perlu_dikumpulkan_2 = 14; // artefak 9 & bimbingan 5
                $jml_sudah_dikumpulkan_2 = $artefak_dikumpulkan_2 + ($resume_bimbingan_2 > 5 ? 5 : $resume_bimbingan_2);
                $jml_perlu_dikumpulkan_3 = 11; // artefak 7 & bimbingan 5
                $jml_sudah_dikumpulkan_3 = $artefak_dikumpulkan_3 + ($resume_bimbingan_3 > 5 ? 5 : $resume_bimbingan_3);
                $jml_perlu_dikumpulkan_4 = 15; // artefak 7 & bimbingan 5
                $jml_sudah_dikumpulkan_4 = $artefak_dikumpulkan_4 + ($resume_bimbingan_4 > 5 ? 5 : $resume_bimbingan_4);

                // Hitung persentase
                $selesaiPercentage1 = ($jml_perlu_dikumpulkan_1 > 0) ? ($jml_sudah_dikumpulkan_1 / $jml_perlu_dikumpulkan_1) * 100 : 0;
                $selesaiPercentage2 = ($jml_perlu_dikumpulkan_2 > 0) ? ($jml_sudah_dikumpulkan_2 / $jml_perlu_dikumpulkan_2) * 100 : 0;
                $selesaiPercentage3 = ($jml_perlu_dikumpulkan_3 > 0) ? ($jml_sudah_dikumpulkan_3 / $jml_perlu_dikumpulkan_3) * 100 : 0;
                $selesaiPercentage4 = ($jml_perlu_dikumpulkan_4 > 0) ? ($jml_sudah_dikumpulkan_4 / $jml_perlu_dikumpulkan_4) * 100 : 0;
                
                return view('beranda.mahasiswa.home', compact('kotas', 'resume_bimbingan_1', 'resume_bimbingan_2', 'resume_bimbingan_3', 'resume_bimbingan_4', 'dosen', 'mahasiswa', 'seminar1', 'seminar2', 'seminar3', 'sidang', 'artefakKota','tahapan_progres', 'selesaiPercentage1', 'selesaiPercentage2', 'selesaiPercentage3', 'selesaiPercentage4', 'mastertahapan'));
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

    public function kota_status(Request $request)
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
            
            $progressStage1Count = ResumeBimbinganModel::join('tbl_kota_has_resume_bimbingan', 'tbl_resume_bimbingan.id_resume_bimbingan', '=', 'tbl_kota_has_resume_bimbingan.id_resume_bimbingan')
                ->where('tbl_kota_has_resume_bimbingan.id_kota', $id_kota)
                ->where('tahapan_progres', '1')
                ->count();
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
    
            $jumlahBimbingan = $progressStage1Count + $progressStage2Count + $progressStage3Count + $progressStage4Count;
    
            $jumlahBimbinganPerKota[] = [
                'kota' => $kota->nama_kota,
                'kelas' => $kota->kelas,
                'jumlah_bimbingan' => $jumlahBimbingan
            ];
        }
    
        return $jumlahBimbinganPerKota;
    }

    private function calculateCompletionPercentage($id_kota, $seminar_1)
    {
        $total_kegiatan = DB::table('tbl_kegiatan_has_timeline as kt')
            ->join('tbl_jadwal_kegiatan as j', 'kt.id_jadwal_kegiatan', '=', 'j.id')
            ->where('kt.id_timeline', $seminar_1)
            ->where('j.id', $id_kota) // Filter berdasarkan kota
            ->count();
    
        $selesai_count = DB::table('tbl_kegiatan_has_timeline as kt')
            ->join('tbl_jadwal_kegiatan as j', 'kt.id_jadwal_kegiatan', '=', 'j.id')
            ->where('kt.id_timeline', $seminar_1)
            ->where('j.status', 'completed')
            ->where('j.id', $id_kota) // Filter berdasarkan kota
            ->count();
    
        return ($total_kegiatan > 0) ? ($selesai_count / $total_kegiatan) * 100 : 0;
    }

    public function showFile($nama_artefak)
    {
        $artefak = DB::table('tbl_kota_has_artefak')
                        ->join('tbl_artefak', 'tbl_kota_has_artefak.id_artefak', '=', 'tbl_artefak.id_artefak')
                        ->where('tbl_artefak.nama_artefak', $nama_artefak)
                        ->select('tbl_kota_has_artefak.file_pengumpulan', 'tbl_kota_has_artefak.id_kota')
                        ->first();

        // Ambil path file dari database
        $filePath = $artefak->file_pengumpulan;
        $idKota = $artefak->id_kota;

        // Periksa apakah file ada
        if (Storage::disk('public')->exists($filePath)) {
            // Redirect ke URL file
            return response()->file(storage_path('app/public/' . $filePath));
        } else {
            $user = auth()->user();
            if($user->role == 3) {
                return redirect()->route('home')->with('error', 'File tidak ditemukan');
            } else {
                return redirect()->route('kota.detail', ['id' => $idKota])->with('error', 'File tidak ditemukan');
            }
        }
    }
}
