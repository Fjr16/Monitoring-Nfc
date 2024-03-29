@extends('layouts.backend.main')
@section('content')
<div class="card">
    <form action="{{ route('user.update', $item->id) }}" method="POST">
    @method('PUT')
    @csrf
        <div class="card-body">
            <h5 class="card-title">Form Edit User</h5>
            <div class="mb-3 row">
                <label for="nama" class="col-md-2 col-form-label">Username</label>
                <div class="col-md-10">
                  <input class="form-control @error('username') is-invalid @enderror" type="text" value="{{ old('username', $item->username) }}" id="username" name="username" />
                    @error('username')
                        <div class="text-danger">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @php
                $passErrors = $errors->get('password');
            @endphp
            <div class="mb-3 row">
                <label for="nama" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                  <input class="form-control @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}" id="password" name="password" placeholder="Kosongkan Bila Tidak Ingin Diubah" />
                  @if ($passErrors) 
                    <div class="text-danger">
                        @foreach ($passErrors as $error)
                            *{{ $error }}
                        @endforeach
                    </div>
                  @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-md-2 col-form-label">Role</label>
                <div class="col-md-10">
                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role">
                        <option selected disabled>Pilih</option>
                        @foreach ($roles as $role)
                            @if (old('role', $item->role) == $role)
                                <option value="{{ $role }}" selected>{{ $role ?? '' }}</option>
                            @else
                                <option value="{{ $role }}">{{ $role ?? '' }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-md-2 col-form-label">Nama</label>
                <div class="col-md-10">
                <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $item->name) }}" id="nama" name="name" />
                    @error('name')
                        <div class="text-danger">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pin_number" class="col-md-2 col-form-label">Pin</label>
                <div class="col-md-10">
                  <input class="form-control @error('pin_number') is-invalid @enderror" type="number" oninput="this.value=this.value.slice(0,6)" value="{{ old('pin_number', $item->pin_number) }}" id="pin_number" name="pin_number" />
                    @error('pin_number')
                        <div class="text-danger">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no" class="col-md-2 col-form-label">no. kartu</label>
                <div class="col-md-10">
                <input class="form-control @error('no_kartu') is-invalid @enderror" type="text" value="{{ old('no_kartu', $item->no_kartu) }}" id="no" name="no_kartu" />
                @error('no_kartu')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="noTelp" class="col-md-2 col-form-label">Tempat / Tanggal Lahir</label>
                <div class="col-md-6">
                <input class="form-control" type="text" value="{{ old('tempat_lhr', $item->tempat_lhr) }}" id="tmpt_lhr" name="tempat_lhr"/>
                </div>
                <div class="col-md-4">
                <input class="form-control" type="date" value="{{ old('tanggal_lhr', $item->tanggal_lhr) }}" id="tgl_lhr" name="tanggal_lhr"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="defaultSelect" class="col-md-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-10">
                    <select id="defaultSelect" class="form-select" name="jenis_kelamin">
                        <option selected disabled>Pilih</option>
                        @foreach ($jks as $jk)
                            @if (old('jenis_kelamin', $item->jenis_kelamin) == $jk)
                                <option value="{{ $jk }}" selected>{{ $jk }}</option>
                            @else
                                <option value="{{ $jk }}">{{ $jk }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="noTelp" class="col-md-2 col-form-label">no. Telp</label>
                <div class="col-md-10">
                <input class="form-control" type="number" value="{{ old('telp', $item->telp) }}" id="noTelp" name="telp"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{!! old('alamat', $item->alamat) !!}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="text-end">
                    <button class="btn btn-sm btn-warning">Simpan</button>
                </div>
            </div>
        </div>
    </form>
  </div>
@endsection
