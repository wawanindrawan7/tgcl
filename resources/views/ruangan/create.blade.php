@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Ruangan</h4>
                    <form action="{{ url('ruangan/create') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Ruangan</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jumlah Kursi</label>
                            <input type="number" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control">
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
