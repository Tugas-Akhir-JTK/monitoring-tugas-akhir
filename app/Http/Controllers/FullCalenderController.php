<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
  
class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('tanggal_mulai', '>=', $request->tanggal_mulai)
                       ->whereDate('tanggal_selesai',   '<=', $request->tanggal_selesai)
                       ->get(['id', 'nama_event', 'tanggal_mulai', 'tanggal_selesai', 'deskripsi']);
  
             return response()->json($data);
        }
  
        return view('fullcalender');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {
 
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'nama_event' => $request->nama_event,
                  'tanggal_mulai' => $request->tanggal_mulai,
                  'tanggal_selesai' => $request->end,
                  'deskripsi' => $request->deskripsi,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                'nama_event' => $request->nama_event,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->end,
                'deskripsi' => $request->deskripsi,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}