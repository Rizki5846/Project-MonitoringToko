<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('BarangMasuk.update', $barangMasuk->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="kode_barang" value="Kode Barang" />
                            <x-text-input id="kode_barang" type="text" name="kode_barang" class="mt-1 block w-full" value="{{ $barangMasuk->kode_barang }}" readonly />
                        </div>
                        
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="Nama Barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full" value="{{ $barangMasuk->nama_barang }}" readonly />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tgl_masuk" value="Tanggal Masuk" />
                            <x-text-input id="tgl_masuk" type="date" name="tgl_masuk" class="mt-1 block w-full" value="{{ $barangMasuk->tgl_masuk }}" required />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jumlah_masuk" value="Jumlah Masuk" />
                            <x-text-input id="jumlah_masuk" type="number" name="jumlah_masuk" class="mt-1 block w-full" value="{{ $barangMasuk->jumlah_masuk }}" required />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('BarangMasuk') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                    
              </div>
            </div>
        </div>
    </div>
</x-app-layout>