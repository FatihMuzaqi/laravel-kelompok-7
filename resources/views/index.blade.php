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
        {{-- <div class="pb-3">
              <form class="d-flex" method="post" action="{{url('pencarian_warna')}}">
                @csrf
                <select class="form-select" aria-label="Default select example" name="pencarian_warna" required>
                  <option value="">Pilih Kategori</option>
                  @foreach($kat as $item)
                  <option value="{{$item->id}}">{{$item->kategori}}</option>
                  @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary">Cari</button>
              </from>
        </div> --}}
        
            <div class="pb-3">
              <form class="d-flex" action="{{url('warna')}}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                  <button class="btn btn-secondary" type="submit" name="cari" value="cari">Cari</button>
              </form>
            </div>
          
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='{{url('warna/create')}}' class="btn btn-primary">+ Tambah Data</a>
              <a href="{{url('cetak_pdf')}}" class="btn btn-primary">Ekspor PDF</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col">NO</th>
                        <th class="col">Kode Warna</th>
                        <th class="col">Nama Warna</th>
                        <th class="col">Kategori</th>
                        <th class="col">Deskripsi</th>
                        <th class="col">Nilai RGB</th>
                        <th class="col">Nilai HEX</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstitem()?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->kode_warna}}</td>
                        <td>{{$item->nama_warna}}</td>
                        <td>{{$item->kategorii->kategori}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>{{$item->nilai_rgb}}</td>
                        <td>{{$item->nilai_hex}}</td>
                        <td>
                            <a href='{{url('warna/'.$item->kode_warna.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('warna.show', $item->kode_warna)}}" class="btn btn-info btn-sm">Show</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{url('warna/'.$item->kode_warna)}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                      </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{$data->withQueryString()->links()}}
      </div>
        @endsection
          <!-- AKHIR DATA -->