@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Booking Ruangan</h4>
                    <form action="{{ url('booking/create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ruangan_id" value="{{ $ruangan->id }}">
                        <div class="form-group mb-3">
                            <label>Nama Yang Booking</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal Booking</label>
                            <input type="date" name="tgl_booking" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jumlah Kursi Yang Di Boking</label>
                            <input type="number" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Mulai</label>
                            <input type="time" name="mulai" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Selesai</label>
                            <input type="time" name="selesai" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
