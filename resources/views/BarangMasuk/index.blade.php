<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Halaman Barang Masuk</h1>
        <div class="grid grid-cols-12 gap-6">
        </div>
        <x-primary-button tag="a" href="{{route('BarangMasuk.create')}}">Add</x-primary-button>
        <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Barang Masuk</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Aksi</th>
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
                            <td>

                                <x-primary-button tag="a" href="{{route('BarangMasuk.edit', $barangmasuk->id)}}">Edit</x-primary-button>

                                <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-barangmasuk-deletion')"
                                x-on:click="$dispatch('set-action', '{{ route('BarangMasuk.destroy', $barangmasuk->id) }}')">
                                {{ __('Delete') }}
                            </x-danger-button>
                            
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                    <x-modal name="confirm-barangmasuk-deletion" focusable maxWidth="xl">
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
            </div>
        </div>
    </div>
</x-app-layout>