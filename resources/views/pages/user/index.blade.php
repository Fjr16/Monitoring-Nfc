@extends('layouts.backend.main')
@section('content')
<div class="card p-4">
  @if (session()->has('success'))
    <div class="alert alert-success mb-3 d-flex" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <div class="d-flex mb-4">
        <h5 class="align-self-center m-0">Daftar Pengguna</h5>
        <a href="{{ route('user.create') }}" class="btn btn-warning ms-auto btn-sm m-0 mx-3">+ Tambah User</a>
      </div>
    <div class="table-responsive">
      <table id="datatable" class="table card-table">
        <thead class="bg-warning">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No. Kartu</th>
                <th>Role</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
        </thead>
        <tbody>
          @foreach ($data as $item)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->name ?? '' }}</td>
              <td>{{ $item->jenis_kelamin ?? '' }}</td>
              <td>{{ $item->no_kartu ?? '' }}</td>
              <td>{{ $item->role ?? '' }}</td>
              <td>{{ $item->telp ?? '' }}</td>
              <td>{!! $item->alamat ?? '' !!}</td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="dropdown-item"  onclick="return confirm('Yakin Ingin Menghapus Data ?')"> <i class="bx bx-trash me-1"></i>Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
</div>
@endsection
