<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Data Mahasiswa</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->nim}}</td>
                        <td>{{$d->address}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{ url('index/create') }}" method="POST">
            @csrf
            <label for="name">Nama</label>
            <input type="text" name="name" id="name">
            <label for="nim">Nim</label>
            <input type="text" name="nim" id="nim">
            <label for="address">Alamat</label>
            <input type="text" name="address" id="address">
            <button type="submit">Simpan</button>
        </form>
    </div>
    @include('sweetalert::alert')
</body>
</html>