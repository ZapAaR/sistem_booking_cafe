<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
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

<h2>Data Kategori</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Slug</th>
            <th>Deskripsi</th>
            <th>Sort</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->sort_order }}</td>
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
