@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('booking/create') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="ruangan_id" value="1">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($ruangan as $item)
                                <div class="col-md-4" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <div class="card text-center">
                                        <div class="card-header bg-success text-white">
                                            Tersedia
                                        </div>
                                        <div class="card-body bg-success text-white">
                                            <h2>{{ $item->nama }}</h2>
                                            <h3>{{ $item->jumlah }} Kursi</h3>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Daftar Booking</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @forelse ($booking as $item)
                                <div class="col-md-4 mt-3" class="btn btn-primary">
                                    <div class="card text-center">
                                        <div class="card-header bg-success text-white">
                                            Nama Booking : {{ $item->nama }}
                                        </div>
                                        <div class="card-body bg-danger text-white">
                                            <h2>Ruangan : {{ $item->ruangan->nama }}</h2>
                                            <h2>Jumlah : {{ $item->ruangan->jumlah }} Kursi</h2>
                                            <h2>Tanggal : {{ $item->tgl_booking }}</h2>
                                            <h3>Mulai : {{ $item->mulai }} - {{ $item->selesai }} WITA</h3>
                                        </div>
                                        <div class="card-footer bg-success">
                                            <a href="{{ url('booking/delete?id=' . $item->id) }}"
                                                class="btn btn-primary">Selesai</a>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="text-center">
                                    <p>Belum ada booking</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
