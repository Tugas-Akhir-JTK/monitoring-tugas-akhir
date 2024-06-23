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
                return view('beranda.koordinator.home');
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
                $progressStage1Count = ResumeBimbinganModel::where('tahapan_progres', '2')->count();
                $progressStage2Count = ResumeBimbinganModel::where('tahapan_progres', '3')->count();
                $progressStage3Count = ResumeBimbinganModel::where('tahapan_progres', '4')->count();

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
            // Query KoTA berdasarkan user yang sedang terautentikasi dan role = 2
            $query = KotaModel::whereHas('users', function ($q) use ($user) {
                $q->where('id_user', $user->id);
            });
        }

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

        if ($user->role == 2) {
            return view('beranda.pembimbing.home', compact('kotas'));
        }
    }
}
