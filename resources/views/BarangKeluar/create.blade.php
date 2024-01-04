<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('BarangKeluar.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="kode_barang" value="Kode Barang" />
                            <x-select-input id="kode_barang" name="kode_barang" class="mt-1 block w-full" required>
                                <option value="">--Pilih Kode barang--</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="Nama Barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full"  readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tanggal_keluar" value="Tanggal Keluar" />
                            <x-text-input id="tgl_keluar" type="date" name="tgl_keluar" class="mt-1 block w-full" value="{{old('tgl_keluar')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_keluar')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jumlah_keluar" value="Jumlah Keluar" />
                            <x-text-input id="jumlah_keluar" type="number" name="jumlah_keluar" class="mt-1 block w-full" value="{{old('jumlah_keluar')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_keluar')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tujuan" value="Tujuan" />
                            <x-text-input id="tujuan" type="text" name="tujuan" class="mt-1 block w-full" value="{{old('tujuan')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('BarangKeluar') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                    <script>
                       const selectKodeBarang = document.getElementById('kode_barang');
                        const inputNamaBarang = document.getElementById('nama_barang');

                        selectKodeBarang.addEventListener('change', function() {
                            const selectedKodeBarang = selectKodeBarang.value;
                            const selectedBarang = {!! $barangs->toJson() !!}; // Gunakan data dari Laravel ke dalam JavaScript
                            
                            const barang = selectedBarang.find(barang => barang.kode_barang === selectedKodeBarang);
                            if (barang) {
                                inputNamaBarang.value = barang.nama_barang;
                            } else {
                                inputNamaBarang.value = ''; // Atur nilai input menjadi kosong jika kode barang tidak ditemukan
                            }
                        });
                    </script>

                    
              </div>
            </div>
        </div>
    </div>
</x-app-layout>