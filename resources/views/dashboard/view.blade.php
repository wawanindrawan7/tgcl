@extends('layouts.master')
@section('content')
    <div class="row">
        <h2>Welcome, {{ Auth::user()->name }}</h2>

    </div>
@endsection
