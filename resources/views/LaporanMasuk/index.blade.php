<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Masuk Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
            </div>
        </div>
    </div>
</x-app-layout>