@extends('layouts.master')
@section('content')
    <h2>Booking Ruangan</h2>
    <div class="row">
        @foreach ($ruangan as $item)
            <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body text-center">
                        <p class="fs-30 mb-2">Ruangan : {{ $item->nama }}</p>
                        <p class="fs-30 mb-2">Jumlah Kursi : {{ $item->jumlah }} Kursi</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('booking/create?id=' . $item->id) }}" class="btn btn-outline-danger">Booking
                            Ruangan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <h2 class="mt-4">Daftar Booking Ruangan</h2>
    <div class="row">
        @forelse ($booking as $item)
            <div class="col-md-4 mt-3" class="btn btn-primary">
                <div class="card text-center">
                    <div class="card-header bg-success text-white">
                        Nama Booking : {{ $item->nama }}
                    </div>
                    <div class="card-body bg-danger text-white">
                        <h2>Ruangan : {{ $item->ruangan->nama }}</h2>
                        <h2>Jumlah : {{ $item->jumlah }} Kursi</h2>
                        <h2>Tanggal : {{ $item->tgl_booking }}</h2>
                        <h2>Mulai : {{ $item->mulai }} - {{ $item->selesai }} WITA</h2>
                    </div>
                    <div class="card-footer bg-success">
                        <a href="{{ url('booking/delete?id=' . $item->id) }}" class="btn btn-primary">Selesai</a>
                    </div>
                </div>

            </div>
        @empty
            <div class="text-center">
                <p>Belum ada booking</p>
            </div>
        @endforelse
    </div>
@endsection
