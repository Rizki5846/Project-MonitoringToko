<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Loporan Barang Masuk</h1>
        
        <div class="grid grid-cols-12 gap-6">
        </div>
                    <x-primary-button tag="a" href="{{route('barangmasuk.print')}}">Cetak Laporan Masuk</x-primary-button>
                    <x-primary-button tag="a" href="{{ route('barangmasuk.export')}}">Export Excel</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Barang Masuk</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>

                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barang_masuk as $barangmasuk)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barangmasuk->tgl_masuk }}</td>
                            <td>{{ $barangmasuk->kode_barang_masuk }}</td>
                            <td>{{ $barangmasuk->kode_barang }}</td>
                            <td>{{ $barangmasuk->barang->nama_barang }}</td>
                            <td>{{ $barangmasuk->jumlah_masuk }}</td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
</x-app-layout>