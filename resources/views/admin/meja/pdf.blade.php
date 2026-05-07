<!DOCTYPE html>
<html>
<head>
    <title>Data Meja</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th { background: #eee; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body>

<h2>Data Meja</h2>

<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nomor_meja }}</td>
            <td>{{ $item->kapasitas }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->lokasi }}</td>
            <td>{{ $item->deskripsi ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    window.onload = function() {
        window.print();
    }
</script>

</body>
</html>
