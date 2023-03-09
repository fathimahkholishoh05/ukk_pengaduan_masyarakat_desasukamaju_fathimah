@extends('layouts.app')
@section('content')
@include('Masyarakat.create')
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>NIK</th>
      <th>Laporan</th>
      <th>Foto</th>
      <th>Status</th>
  </thead>
  <tbody>
@foreach ($pengaduan as $pd)
    <tr>
      <td>{{ $pd->tgl_pengaduan}}</td>
      <td>{{ $pd->nik}}</td>
      <td>{{ $pd->isi_laporan}}</td>
      <td><img src="{{ asset('images') }}/{{ $pd->foto }}" width="50px" height="50px"></td>
      <td>{{ $pd->status}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection





<!-- @extends('layouts.app')
@section('content')
<!-- <button class="btn btn-primary mb-2">Tambah Pengaduan</button> -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggapiModal">
        Tanggapi
      </button>
</br>
@include('Masyarakat.create')
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>NIK</th>
      <th>Laporan</th>
      <th>Foto</th>
      <th>Status</th>
      <?php if (auth()->user()->type > 1){ ?>
      <th>Option</th>
      <?php  } ?>
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
      <?php if (auth()->user()->type > 1){ ?>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggapiModal">
        Tanggapi
      </button>
      </td>
      <?php } ?>
    </tr>
    @endforeach
  </tbody>
</table>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="tanggapiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{" method="post"></form>
      <div class="modal-body">
        <div class="input-group">
          <textarea name="tanggapi" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection -->