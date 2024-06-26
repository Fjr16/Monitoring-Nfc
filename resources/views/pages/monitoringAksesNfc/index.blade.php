@extends('layouts.backend.main')
@section('content')
<div class="card">
  <div class="card-header d-flex">
    <h5>Monitoring Akses NFC</h5>
    <button id="print" class="ms-auto btn btn-primary" target="_blank"><i class="bx bx-printer"></i> Print</button>
  </div>
    <div class="table-responsive px-3">
      <table id="datatable" class="table card-table">
        <thead class="bg-warning">
          <tr>
            <th>Tanggal/Jam Akses</th>
            <th>No. Kartu</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
              <td>{{ $item->tanggal ?? '' }}</td>
              <td>{{ $item->user->no_kartu ?? '' }}</td>
              <td>{{ $item->user->name ?? '' }}</td>
              <td>{{ $item->user->jenis_kelamin ?? '' }}</td>
              <td>{!! $item->user->alamat ?? '' !!}</td>
              <td>
                  <img src="{{ asset('/'. $item->image ?? '') }}" width="90" alt="">
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
