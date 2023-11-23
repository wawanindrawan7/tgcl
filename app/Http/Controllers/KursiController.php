<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KursiController extends Controller
{
    public function index()
    {
        return view('kursi.index');
    }
}
