<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF Tabel Warna</title> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan PDF Tabel Warna</h4>
	
	</center>
 
	<table class='table table-bordered'>
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
        
            @php
            $no = 1;
            @endphp
            @foreach ($kategori as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->kode_warna}}</td>
                <td>{{$item->nama_warna}}</td>
                <td>{{$item->kategorii->kategori}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>{{$item->nilai_rgb}}</td>
                <td>{{$item->nilai_hex}}</td>
                </tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>