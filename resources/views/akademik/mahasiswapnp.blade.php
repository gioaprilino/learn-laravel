@extends('layouts.main')
@section('title')
Daftar Mahasiswa
@endsection
@section('content')
   <h1>Daftar Mahasiswa jurusan ti</h1>
   <table>
     <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>NIM</th>
         <th>Prodi</th>
         <th>Jurusan    </th>

       </tr>
     </thead>
     <tbody>
      @foreach ($mhs as $mahasiswa)
      <tr>
       <td>{{ $mahasiswa->id}}</td>
       <td>{{ $mahasiswa->name  }} </td>
       <td>{{ $mahasiswa->nim  }} </td>
       <td>{{ $mahasiswa->prodi  }} </td>
       <td>{{ $mahasiswa->jurusan  }} </td>

     </tr>
      @endforeach
   </table>
   <div class="pagination-container">
     {{ $mhs->links() }}
 </div>
@endsection
