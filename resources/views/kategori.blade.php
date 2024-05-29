@extends('layout.template')
@section('konten')
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <span class="fs-4"><b>TABEL WARNA</b></span>
    </a>
    <ul class="nav nav-pills">
      <li class="nav-item"><a href="warna" class="nav-link active" aria-current="page">Reset</a></li>
      <li class="nav-item"><a href="/sesi/logout" class="nav-link">Logout</a></li>
    </ul>
  </header>
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
              <form class="d-flex" action="{{url('warna')}}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Cari</button>
              </form>
            </div>
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='{{url('warna/create')}}' class="btn btn-primary">+ Tambah Data</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col">Kode Kategori</th>
                        <th class="col"> Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($kategori as $item)
                    <tr>
                        {{-- <td>{{$i}}</td> --}}
                        <td>{{$item->id}}</td>
                        <td>{{$item->kategori}}</td>
                      </tr>
                    
                    @endforeach
                </tbody>
            </table>
            
      </div>
        @endsection
          <!-- AKHIR DATA -->