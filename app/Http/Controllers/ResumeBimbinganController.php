<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ResumeBimbinganModel;

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
    public function index()
    {
        $resumes = ResumeBimbinganModel::all();
        return view('bimbingan/resume/index', compact('resumes'));
    }

    public function create()
    {
        return view('bimbingan/resume/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_bimbingan' => 'required',
            'waktu_bimbingan' => 'required',
            'isi_resume_bimbingan' => 'required',
            'progres_pengerjaan' => 'required',
            'tahapan_progres' => 'required',
        ]);

        if ($request->all()) {
            ResumeBimbinganModel::create($request->all());
            session()->flash('success', 'Data resume berhasil ditambahkan');
        }

        return redirect()->route('resume');
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

        return view('bimbingan/resume/detail', compact('resumes', 'tahapan_progres'));
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

        return view('bimbingan/resume/edit', compact('resume', 'tahapan_progres'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_bimbingan' => 'required',
            'waktu_bimbingan' => 'required',
            'isi_resume_bimbingan' => 'required',
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
