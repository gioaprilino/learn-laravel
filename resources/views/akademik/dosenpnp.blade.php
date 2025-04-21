@extends('layouts.main')
@section('title', "daftar dosen")
@section('content')
<h1>Daftar Dosen Jurusan TI</h1>
<ol>
    @forelse ($dsn as $namaDsn)

    <li>{{$namaDsn}}</li>
    @empty
    <div class="alert alert-warning d-inline-block">
    Data Dosen tidak tersedia, silahkan isi Array untuk data Dosen!
    </div>
    @endforelse
</ol>
@endsection
