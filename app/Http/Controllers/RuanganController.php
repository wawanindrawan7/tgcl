<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function view()
    {
        $ruangan = Ruangan::all();
        return view('ruangan.view', compact('ruangan'));
    }

    public function create(Request $r)
    {
        if ($r->method() == "GET") {
            return view('ruangan.create');
        } else {
            $ruangan = Ruangan::create([
                'nama' => $r->nama,
                'jumlah' => $r->jumlah
            ]);

            if ($ruangan) {
                return redirect()->to('ruangan');
            }
        }
    }

    public function delete(Request $r)
    {
        $ruangan = Ruangan::find($r->id);
        $ruangan->delete();
        return redirect()->to('ruangan');
    }
}
