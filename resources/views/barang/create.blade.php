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

                    <form method="post" action="{{ route('barang.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="title" value="Nama Barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full" value="{{ old('nama_barang')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jenisBarang" value="Jenis Barang" />
                            <x-select-input id="jenis" name="jenis_barang_id" class="mt-1 block w-full" required>
                                <option value="">--Pilih jenis barang--</option>
                                @foreach($jenisBarangs as $jenisBarang)
                                    <option value="{{ $jenisBarang->id }}">{{ $jenisBarang->nama }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="quantity" value="Harga" />
                            <x-text-input id="harga" type="number" name="harga" class="mt-1 block w-full" value="{{old('harga')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="cover" value="Halaman Sampul Depan" />
                            <x-file-input id="cover" name="cover" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('barang') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>