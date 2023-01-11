<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Permintaan pelanggan</title>
    
</head>
<body>
    <h2 class="text-center mb-4">Data pelanggan</h2>
    <div class="container">
        <a href= "{{url ('/member') }}" type="button" class="btn btn-primary">Kembali</a>
      <div class="row">
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">NoTelp</th>
            <th scope="col">Servis</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Berat(Kg)</th>
            <th scope="col">Biaya</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal</th>
            
          </tr>
        </thead>
        <tbody>
            @php 
              $no = 1;
            @endphp
            @foreach ($data_pelanggan as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->no_telp }}</td>
            <td>{{ $row->servis }}</td>
            <td>{{ $row->keterangan }}</td>
            <td>{{ $row->kg }}</td>
            <td>{{ $row->biaya }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ $row->updated_at->format('D M Y')}}</td>
            <td>
            </td>
        </tr>
       @endforeach
    
</body>
</html>