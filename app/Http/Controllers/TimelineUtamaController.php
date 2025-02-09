<?php

namespace App\Http\Controllers;

use App\Models\ArtefakModel;
use App\Models\TimelineUtamaModel;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TimelineUtamaController extends Controller
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
        $timelines = TimelineUtamaModel::where('periode_id', 3)
                                        ->orderBy('tanggal_mulai', 'asc')
                                        ->get()
                                        ->toarray();
        $artefaks_selected = ArtefakModel::where('periode_id',3)
                                ->where('timeline_utama_id', '!=', null) 
                                ->get()
                                ->toarray();
        $artefak_available = ArtefakModel::where('periode_id', 3)
                                        ->get()
                                        ->toarray();

        foreach($artefaks_selected as $artefak) {
            foreach($timelines as &$timeline) {
                if (Str::contains($timeline['tanggal_mulai'], '-')) {
                    $timeline['tanggal_mulai'] = Carbon::parse($timeline['tanggal_mulai'])->locale('id')->translatedFormat('l, d F Y');
                }

                if (Str::contains($timeline['tanggal_selesai'], '-')) {
                    $timeline['tanggal_selesai'] = Carbon::parse($timeline['tanggal_selesai'])->locale('id')->translatedFormat('l, d F Y');
                }

                if ($artefak['timeline_utama_id'] === $timeline['id']) {
                    if(isset($timeline['artefaks'])) {
                        array_push($timeline['artefaks'], $artefak);
                    } else {
                        $timeline['artefaks'] = [$artefak];
                    }
                }
                ;
            }
            unset($timeline);
        }

        return view('timeline.index', ['timelines' => $timelines, 'artefaks' => $artefak_available]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_timeline' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi_timeline' => 'required',
        ]);

        if($request->artefak_id_selected == []) {
            session()->flash('error', 'Gagal menambahkan timeline. Harap pilih setidaknya satu artefak.');
            return redirect()->back()->withInput();
        }
        

        $existingTimeline = TimelineUtamaModel::where('nama_timeline', $request->nama_timeline)->exists();
        if($existingTimeline) {
            session()->flash('error', 'Gagal menambahkan timeline. Nama Timeline sudah terdaftar');
            return redirect()->back()->withInput();
        }

        try {
            // memeriksa artefak apakah sudah terdaftar pada timeline lain
            foreach($request->input('artefak_id_selected') as $artefak_id) {
                $artefak_data = ArtefakModel::findOrFail($artefak_id);
                if ($artefak_data->timeline_utama_id !== null) {
                    return redirect()->route('timeline')->with('error', 'Gagal menambah Timeline. Artefak yang dipilih sudah terdaftar pada timeline lain.');
                }
                unset($artefak_data);
            }

            $timeline_data = TimelineUtamaModel::create([
                'periode_id' => 3,
                'nama_timeline' =>$request->input('nama_timeline'),
                'tanggal_mulai' => $request->input('tanggal_mulai'),
                'tanggal_selesai' => $request->input('tanggal_selesai'),
                'deskripsi_timeline' => $request->input('deskripsi_timeline')
            ]);

            // id dari timeline yang baru di insert
            $timeline_data_id = $timeline_data->id;

            foreach($request->input('artefak_id_selected') as $artefak_id) {
                $artefak_data = ArtefakModel::findOrFail($artefak_id);
                $artefak_data->update(['timeline_utama_id' => $timeline_data_id]);
                unset($artefak_data);
            }

            session()->flash('success', 'Timeline '. $request->input('nama_timeline') .' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menambah Timeline. Silakan coba lagi.');
        }

        return redirect()->route('timeline');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_timeline' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi_timeline' => 'required',
        ]);

        $timeline = TimelineUtamaModel::findOrFail($id);
        $artefak_selected_id_new = $request->input('artefak_id_selected');
        $artefak_selected_old = ArtefakModel::where('timeline_utama_id', $id)->get()->toArray();

        try {
            // Update data timeline
            $timeline->update([
                'nama_timeline' => $request->input('nama_timeline'),
                'tanggal_mulai' => $request->input('tanggal_mulai'),
                'tanggal_selesai' => $request->input('tanggal_selesai'),
                'deskripsi_timeline' => $request->input('deskripsi_timeline'),
            ]);

            // jika ada yang di uncheck
            foreach($artefak_selected_old as $artefak_old) {
                $is_found = false;

                foreach($artefak_selected_id_new as $artefak_id_new) {
                    if ($artefak_old['id'] == $artefak_id_new) {
                        $is_found = true;
                        break;
                    }
                    unset($artefak_id_new);
                }

                if(!$is_found) {
                    ArtefakModel::where('id', $artefak_old['id'])->update(['timeline_utama_id' => null]);
                }
                unset($artefak_old);
            }

            // jika ada yang di check
            foreach($request->input('artefak_id_selected') as $artefak_id) {
                $artefak_data = ArtefakModel::findOrFail($artefak_id);

                if($artefak_data->timeline_utama_id !== null && $artefak_data->timeline_utama_id != $id) {
                    session()->flash('error', 'Gagal mengupdate Timeline. Artefak yang dipilih sudah terdaftar pada timeline lain.');
                }

                if($artefak_data->timeline_utama_id == null) {
                    $artefak_data->update(['timeline_utama_id' => $id]);
                }
                unset($artefak_data);
            }

            session()->flash('success', 'Data Timeline berhasil di update');
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal mengupdate Timeline. Silakan coba lagi.');
        }

        return redirect()->route('timeline');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $timeline = TimelineUtamaModel::findOrFail($id);
            $timeline->delete();

            session()->flash('success', 'Data Timeline berhasil dihapus');
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menghapus Timeline. Silakan coba lagi.');
        }

        return redirect()->route('timeline');
    }
}
