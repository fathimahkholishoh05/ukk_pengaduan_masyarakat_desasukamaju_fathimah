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
      <th>Status</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
@foreach ($pengaduan as $pd)
    <tr>
      <td>{{ $pd->tgl_pengaduan}}</td>
      <td>{{ $pd->nik}}</td>
      <td>{{ $pd->isi_laporan}}</td>
      <td><img src="{{ asset('images') }}/{{ $pd->foto }}" width="50px" height="50px"></td>
      <td>{{ $pd->status}}</td>
      <td>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pd->id}}">
        Tanggapi
        </button>
      </td>
      <div class="modal fade" id="exampleModal{{$pd->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tanggapan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <div class="modal-body">
      <form method="GET" action="{{ route('Tanggapan.stores', $pd->id) }}">
        @csrf 
    <input type="hidden" name="id" value="{{ $pd->id }}">
            <div class="mb-3">
               <label for="exampletanggapan" class="form-label">Menanggapi</label>
               <input type="text" name="tanggapan" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    </div>
  </div>
</div>
    @endforeach
  </tbody>
</table>
<!-- Button trigger modal -->


<!-- Modal -->


@endsection