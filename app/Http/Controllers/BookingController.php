<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\History;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function view()
    {
        $ruangan = Ruangan::all();
        $booking = Booking::all()->sortByDesc("mulai");
        return view('booking.view', compact('ruangan', 'booking'));
    }

    public function create(Request $r)
    {

        Booking::create([
            'nama' => $r->nama,
            'tgl_booking' => $r->tgl_booking,
            'mulai' => $r->mulai,
            'selesai' => $r->selesai,
            'ruangan_id' => $r->ruangan_id
        ]);

        History::create([
            'nama' => $r->nama,
            'tgl_booking' => $r->tgl_booking,
            'mulai' => $r->mulai,
            'selesai' => $r->selesai,
            'ruangan_id' => $r->ruangan_id
        ]);


        return redirect()->to('booking');
    }

    public function delete(Request $r)
    {
        $booking = Booking::find($r->id);
        $booking->delete();
        return redirect()->to('booking');
    }

    public function history()
    {
        $history = History::all();
        return view('history.view', compact('history'));
    }
}
