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
        @if (Auth::user()->role == 'Admin')
            <!-- Modal -->
            <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveModalLabel">Konfirmasi Approve</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin melakukan approve?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a id="approveButton" href="#" class="btn btn-danger">Approve</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveModalLabel">Konfirmasi Selesai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin melakukan selesai?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a id="selesaiButton" href="#" class="btn btn-danger">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                                        <th>Kursi</th>
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
                                            <td>{{ $item->kursi }}</td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="btn btn-success">Berhasil di Booking</span>
                                                @else
                                                    <span class="btn btn-warning">Menunggu Verifikasi Admin</span>
                                                @endif
                                            </td>
                                            @if (Auth::user()->role == 'Admin')
                                                @if ($item->status != 1)
                                                    <td>
                                                        <button class="btn btn-danger approveBtn" data-toggle="modal"
                                                            data-target="#approveModal"
                                                            data-id="{{ $item->id }}">Approve</button>
                                                    </td>
                                                @else
                                                    <td>
                                                        <p>Sudah di booking</p>
                                                    </td>
                                                @endif
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.approveBtn').on('click', function() {
                var bookingId = $(this).data('id');
                var approveLink = "{{ url('booking/approve?id=') }}" + bookingId;
                $('#approveButton').attr('href', approveLink);
            });
        });

        $(document).ready(function() {
            $('.selesaiBtn').on('click', function() {
                var bookingId = $(this).data('id');
                var approveLink = "{{ url('booking/selesai?id=') }}" + bookingId;
                $('#selesaiButton').attr('href', approveLink);
            });
        });
    </script>
@endsection
