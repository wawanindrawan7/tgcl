@extends('layouts.master')
@section('content')
    <h2>Booking Ruangan</h2>
    <div class="row">
        @foreach ($ruangan as $item)
            <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card text-center shadow">
                    <div class="card-header">
                        <h3>{{ $item->nama }}</h3>
                    </div>
                    <div class="card-body bg-primary text-white">
                        <p class="fs-30 mb-2">Jumlah Kursi : {{ $item->jumlah }} Kursi</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('booking/create?id=' . $item->id) }}" class="btn btn-outline-danger">Booking
                            Ruangan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
    @if (Auth::user()->status == 'admin')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ruangan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Yang Booking</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a href="{{ url('history/delete?id=') . $item->id }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ruangan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Yang Booking</th>
                                        <th>Status Booking</th>
                                        @if (Auth::user()->role == 'Admin')
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="btn btn-success">Berhasil di Booking</span>
                                                @else
                                                    <span class="btn btn-warning">Menunggu Verifikasi Admin</span>
                                                @endif
                                            </td>
                                            @if (Auth::user()->role == 'Admin')
                                                <td>
                                                    <a href="{{ url('booking/approve?id=') . $item->id }}"
                                                        class="btn btn-danger">Approve</a>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
