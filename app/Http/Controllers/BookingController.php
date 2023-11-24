<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\History;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

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

        return redirect()->to('booking')->with(['success' => 'Kursi Berhasil Dibooking menunggu approve admin!']);
    }

    public function approve(Request $r)
    {
        $booking = Booking::find($r->id);
        $booking->update([
            'status' => 1
        ]);

        return redirect()->to('booking')->with(['success' => 'Kursi Berhasil Dibooking!']);
    }




    public function delete(Request $r)
    {
        $booking = Booking::find($r->id);
        $booking->delete();
        return redirect()->to('booking')->with(['success' => 'Kursi selesai digunakan!']);
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

    public function cari(Request $request)
    {
        $ruangan = Ruangan::all();
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $booking = DB::table('bookings')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('booking.view', compact('booking', 'ruangan'));
    }
}
