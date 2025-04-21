@extends('layouts.main')
@section('title')
Daftar Dosen
@endsection
@section('content')
  <h1>Daftar Dosen jurusan ti</h1>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Nip</th>
        <th>Keahlian</th>
      </tr>
    </thead>
    <tbody>
     {{-- @foreach ($dsn as $dosen) --}}
     <tr>
      <td>{{ $dosen->id}}</td>
      <td>{{ $dosen->nama  }} </td>
      <td>{{ $dosen->nip  }} </td>
      <td>{{ $dosen->keahlian  }} </td>

    </tr>
     {{-- @endforeach --}}
  </table>

@endsection


