@extends('layouts.master')
@section('content')
    <div class="row">
        @for ($i = 1; $i <= $ruangan->jumlah; $i++)
            @php
                $array = ['kursi' => 'K'];
                $cekData = json_encode($array);
            @endphp
            @if ($ruangan->booking($cekData) == null)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <a href="{{ url('booking', ['kursi' => 'K' . $i, 'data' => Crypt::encrypt($data)]) }}">
                        {{-- {{ route('pesan', ['kursi' => 'K' . $i, 'data' => Crypt::encrypt($data)]) }} --}}
                        <div class="col-md-12 mb-4 stretch-card transparent">
                            <div class="card card-tale text-center">
                                <div class="card-body">
                                    <h1>K{{ $i }}</h1>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            @else
                <p>apa mungkin</p>
            @endif
        @endfor

    </div>

    <script>
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }
    </script>
@endsection
