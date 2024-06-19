<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ResumeBimbinganModel;
use App\Models\KotaHasResumeBimbinganModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResumeBimbinganController extends Controller
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
        $query = ResumeBimbinganModel::query();

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

        $resumes = $query->paginate(10);
        // $tahapan_progres = $request->input('tahap$tahapan_progres');
    
        // if ($tahapan_progres) {
        //     $resumes = ResumeBimbinganModel::where('tahap$tahapan_progres', $tahapan_progres)->get(); 
        // } else {
        //     $resumes = ResumeBimbinganModel::all();
        // }

        // $resumes = ResumeBimbinganModel::all();
        return view('bimbingan/resume/index', compact('resumes', ));
    }

    public function create()
    {
        $user = auth()->user();
    
        // Mendapatkan id_kota dari user yang sedang login
        $id_kota = DB::table('tbl_kota_has_user')
                    ->where('id_user', $user->id)
                    ->value('id_kota');
    
        // Query untuk mencari user dengan role 2 yang ada dalam kota yang sama
        $dosen = DB::table('users')
                  ->join('tbl_kota_has_user', 'users.id', '=', 'tbl_kota_has_user.id_user')
                  ->where('users.role', 2)
                  ->where('tbl_kota_has_user.id_kota', $id_kota)
                  ->select('users.*')
                  ->get();
    
        return view('bimbingan/resume/create', compact('dosen'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_bimbingan' => 'required',
            'waktu_bimbingan' => 'required',
            'isi_resume_bimbingan' => 'required',
            'isi_revisi_bimbingan' => '',
            'progres_pengerjaan' => 'required',
            'tahapan_progres' => 'required',
        ]);

        if ($request->all()) {
            $resume = ResumeBimbinganModel::create($request->all());
            $id_resume_bimbingan = $resume->id_resume_bimbingan;
        }

        // Mendapatkan id_kota dari user yang sedang login
        $user = auth()->user();

        // Query untuk mencari id_kota dari tbl_kota_has_user
        $id_kota = DB::table('tbl_kota_has_user')
                    ->where('id_user', $user->id)
                    ->value('id_kota');

        // Query untuk mencari id_user dengan role '2'
        $id_user_role_2 = DB::table('users')
                        ->where('role', 2)
                        ->value('id');

        // Pastikan id_kota dan id_user_role_2 valid sebelum menyimpan
        if ($id_kota && $id_user_role_2) {
            KotaHasResumeBimbinganModel::create([
                'id_kota' => $id_kota,
                'id_user' => $id_user_role_2, // Menggunakan id_user dengan role '2'
                'id_resume_bimbingan' => $id_resume_bimbingan,
            ]);

            return redirect()->route('resume')->with('success', 'Tugas berhasil dikumpulkan!');
        } else {
            // Handle jika id_kota atau id_user_role_2 tidak ditemukan atau tidak valid
            return redirect()->route('resume')->with('error', 'Gagal menyimpan data: id_kota atau id_user dengan role 2 tidak valid.');
        }
    }

    public function detail($id)
    {
        $resumes = ResumeBimbinganModel::findOrFail($id);

        $tahapan_progres = '';
        if ($resumes->tahapan_progres == 1) {
            $tahapan_progres = "Seminar 2";
        } elseif ($resumes->tahapan_progres == 2) {
            $tahapan_progres = "Seminar 3";
        } elseif ($resumes->tahapan_progres == 3) {
            $tahapan_progres = "Sidang";
        } else {
            $tahapan_progres = "Unknown";
        }

        return view('bimbingan/resume/detail', compact('resumes', 'tahapan_progres', 'dosen'));
    }

    public function edit($id)
    {
        $resume = ResumeBimbinganModel::findOrFail($id);
        if (!$resume) {
            return redirect()->route('resume')->withErrors('Data tidak ditemukan.');
        }

        $tahapan_progres = '';
        if ($resume->tahapan_progres == 1) {
            $tahapan_progres = "Seminar 2";
        } elseif ($resume->tahapan_progres == 2) {
            $tahapan_progres = "Seminar 3";
        } elseif ($resume->tahapan_progres == 3) {
            $tahapan_progres = "Sidang";
        } else {
            $tahapan_progres = "Unknown";
        }

        $dosen =DB::table('tbl_resume_bimbingan as rb')
                    ->join('tbl_kota_has_resume_bimbingan as krb', 'rb.id_resume_bimbingan', '=', 'krb.id_resume_bimbingan')
                    ->join('users as u', 'krb.id_user', '=', 'u.id')
                    ->select('rb.*', 'u.name as nama_dosen')
                    ->where('rb.id_resume_bimbingan', $id)
                    ->first();
                    
        return view('bimbingan/resume/edit', compact('resume', 'tahapan_progres', 'dosen'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_bimbingan' => 'required',
            'waktu_bimbingan' => 'required',
            'isi_resume_bimbingan' => 'required',
            'isi_revisi_bimbingan' => '',
            'progres_pengerjaan' => 'required',
            'tahapan_progres' => 'required',
        ]);
        
        $resume = ResumeBimbinganModel::findOrFail($id);
        
        // Check if any field is changed
        $changes = $request->except(['_token']) != $resume->only(array_keys($request->except(['_token'])));

        if ($changes) {
            $resume->update($request->all());
            session()->flash('success', 'Data resume berhasil dirubah');
        }


        return redirect()->route('resume');
    }

    public function destroy($id)
    {
        $resume = ResumeBimbinganModel::findOrFail($id);
        Storage::delete('/resume'. $resume->id_resume_bimbingan);
        $resume->delete();

        session()->flash('success', 'Data berhasil dihapus');
        
        return redirect()->route('resume');
    }
}
