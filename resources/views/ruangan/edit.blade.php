@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Ubah Ruangan</h4>
                    <form action="{{ url('ruangan/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $ruangan->id }}">
                        <div class="form-group mb-3">
                            <label>Nama Ruangan</label>
                            <input type="text" name="nama" class="form-control" value="{{ $ruangan->nama }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jumlah Kursi</label>
                            <input type="number" name="jumlah" class="form-control" value="{{ $ruangan->jumlah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Mulai</label>
                            <input type="time" name="jam_mulai" value="{{ $ruangan->jam_mulai }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Selesai</label>
                            <input type="time" name="jam_selesai" value="{{ $ruangan->jam_selesai }}"
                                class="form-control">
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
