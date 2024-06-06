<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class JadwalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $eventModel = new Event();
        $events = $eventModel->getevent();

        return view('jadwal.index', compact('events'));
    }
}
