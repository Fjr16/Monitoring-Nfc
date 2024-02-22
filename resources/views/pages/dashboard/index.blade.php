@extends('layouts.backend.main')
@section('content')
<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name ?? '' }}! 🎉</h5>
                <p class="mb-4">
                  Selamat Datang Di Laman Website Monitoring Akses NFC. <br> Website ini menyediakan report tentang akses NFC.
                </p>

                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/medical-illustration-doctor.png"
                  data-app-light-img="illustrations/medical-illustration-doctor.png"
                />
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">Users Report</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                  </div>
                  <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                      ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">84,686k</h3>
                  </div>
                </div>
                <div id="profileReportChart"></div>
              </div>
            </div>
        </div>
    </div>
</div>
@canany(['admin', 'manager'])  
  <div class="card">
      <h5 class="card-header">Preview Table Monitoring Akses NFC</h5>
      <div class="table-responsive">
        <table class="table card-table">
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
                    <img src="{{ asset('storage/' . $item->image) }}" width="90" alt="">
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <tr class="text-center">
                  <td colspan="6">
                      <a href="{{ route('monitoring/access/nfc.index') }}" class="btn"><span class="">View All</span> <i class='fs-3 bx bx-right-arrow-alt' ></i></a>
                  </td>
              </tr>
          </tfoot>
        </table>
      </div>
  </div>
@endcanany
@endsection
