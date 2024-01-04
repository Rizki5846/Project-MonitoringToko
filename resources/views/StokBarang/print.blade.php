
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok Barang</title>
    <style>
        /* Gaya atau styling untuk tampilan laporan */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Stok Barang</h1>
    
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Stok Awal</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Total Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $barang)
                <tr>
                    <td>{{ $barang['kode_barang'] }}</td>
                    <td>{{ $barang['nama_barang'] }}</td>
                    <td>{{ $barang['jenis'] }}</td>
                    <td>{{ $barang['stok_awal'] }}</td>
                    <td>{{ $barang['jumlah_masuk'] }}</td>
                    <td>{{ $barang['jumlah_keluar'] }}</td>
                    <td>{{ $barang['total_stok'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
