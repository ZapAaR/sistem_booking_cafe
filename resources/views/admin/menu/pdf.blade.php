<!DOCTYPE html>
<html>
<head>
    <title>Data Menu</title>
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

<h2>Data Menu</h2>

<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Menu</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Tersedia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                 @if ($item->gambar)
                    <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}" style="max-width: 100px;">
                @else
                    Tidak ada gambar
                @endif
                <p>{{ $item->nama }}</p>
            </td>
            <td>{{ $item->kategori->nama ?? 'N/A' }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
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
