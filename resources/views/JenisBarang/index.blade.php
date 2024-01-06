<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Halaman Jenis Barang</h1>
        <div class="grid grid-cols-12 gap-6">
        </div>
        <x-primary-button tag="a" href="{{ route('JenisBarang.create') }}">Add</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Jenis Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($jenis_barangs as $jenisbarang)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $jenisbarang['nama'] }}</td>
                            <td></td>
                                
                        </tr>
                        @endforeach
                    </x-table>
                   
                </div>
</x-app-layout>
