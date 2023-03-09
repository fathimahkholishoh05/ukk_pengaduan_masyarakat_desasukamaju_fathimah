@extends('layouts.app')
@section('content')
<!-- <button class="btn btn-primary mb-2">Tambah Pengaduan</button> -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>NIK</th>
      <th>Laporan</th>
      <th>Foto</th>
      <th>Tanggapan</th>
    </tr>
  </thead>
  <tbody>
   
    @for ($i = 0; $i < $a; $i++)
      <tr>
        <td>{{ $data[$i]['tanggal'] }}</td> 
        <td>{{ $data[$i]['nik'] }}</td> 
        <td>{{ $data[$i]['laporan'] }}</td> 
        <td><img src="{{ asset('images')}}/{{$data[$i]['foto']}}" height="50px" width="50px" alt=""></td> 
        <td>{{ $data[$i]['tanggapan'] }}</td> 
      </tr>
    @endfor
  </tbody>
</table>
@endsection