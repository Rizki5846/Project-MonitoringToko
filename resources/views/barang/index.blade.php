<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Halaman Barang</h1>
        <div class="grid grid-cols-12 gap-6">
        </div>
        <x-primary-button tag="a" href="{{ route('barang.create') }}">Add</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis</th> 
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($data as $barang)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barang['kode_barang'] }}</td>
                            <td>{{ $barang['nama_barang'] }}</td>
                            <td>{{ $barang['jenis'] }}</td> 
                            <td>{{ $barang['harga'] }}</td>
                            <td>
                                <img src="{{ asset('storage/cover_barang/'.$barang['cover']) }}" width="100px" />
                            </td>
                            <td>{{ $barang['total_stok'] }}</td>
                            <td>

                                <x-primary-button tag="a" href="{{route('barang.edit', $barang['id'])}}">Edit</x-primary-button>

                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-book-deletion')"
                                    x-on:click="$dispatch('set-action', '{{ route('barang.destroy', $barang['id']) }}')">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                    <x-modal name="confirm-book-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilaksanakan. Data akan dihilangkan secara permanen.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Delete!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
</x-app-layout>
