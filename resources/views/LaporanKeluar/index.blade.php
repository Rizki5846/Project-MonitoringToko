<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Loporan Barang Keluar</h1>
        
        <div class="grid grid-cols-12 gap-6">
        </div>
                    <x-primary-button tag="a" href="{{route('barangkeluar.print')}}">Cetak Laporan Masuk</x-primary-button>
                    <x-primary-button tag="a" href="{{ route('barangkeluar.export')}}">Export Excel</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Tanggal Keluar</th>
                                <th>Kode Barang Keluar</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah keluar</th>
                                <th>Tujuan</th>

                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barang_keluar as $barangkeluar)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barangkeluar->tgl_keluar }}</td>
                            <td>{{ $barangkeluar->kode_barang_keluar }}</td>
                            <td>{{ $barangkeluar->kode_barang }}</td>
                            <td>{{ $barangkeluar->barang->nama_barang }}</td>
                            <td>{{ $barangkeluar->jumlah_keluar }}</td>
                            <td>{{ $barangkeluar->tujuan }}</td>
                        </tr>
                        @endforeach

                    </x-table>
    </div>
</x-app-layout>