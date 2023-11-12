@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Create Ruangan</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url('ruangan/create') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Nama Ruangan</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Jumlah Kursi</label>
                                <input type="text" name="jumlah" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
