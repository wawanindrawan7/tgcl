<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\History;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BookingController extends Controller
{
    public function view()
    {
        $ruangan = Ruangan::all();
        $booking = Booking::all();
        return view('booking.view', compact('ruangan', 'booking'));
    }



    public function create(Request $r)
    {

        if ($r->method() == "GET") {
            $data = json_decode($r->id);
            $ruangan = Ruangan::find($r->id);

            return view('booking.create', compact('ruangan', 'data'));
        } else {
            // Booking::create([
            //     'nama' => $r->nama,
            //     'tgl_booking' => $r->tgl_booking,
            //     'jumlah' => $r->jumlah,
            //     'mulai' => $r->mulai,
            //     'selesai' => $r->selesai,
            //     'ruangan_id' => $r->ruangan_id
            // ]);

            // History::create([
            //     'nama' => $r->nama,
            //     'tgl_booking' => $r->tgl_booking,
            //     // 'jumlah' => $r->jumlah,
            //     'mulai' => $r->mulai,
            //     'selesai' => $r->selesai,
            //     'ruangan_id' => $r->ruangan_id
            // ]);


            return redirect()->to('booking');
        }
    }

    public function pesan($kursi, $data)
    {
        Booking::create([
            'nama' => Auth::user()->name,
            'kursi' => $kursi,
            'status' => 0,
            'ruangans_id' => $data
        ]);

        return redirect('/booking');
    }

    public function approve(Request $r)
    {
        $booking = Booking::find($r->id);
        $booking->update([
            'status' => 1
        ]);

        return redirect('/booking');
    }

    public function selesai(Request $r)
    {
        $booking = Booking::find($r->id);
        $booking->update([
            'status' => 0
        ]);

        return redirect('/booking');
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

    public function historyDelete(Request $r)
    {
        $h = History::find($r->id);
        $h->delete();
        return redirect()->to('history');
    }
}
