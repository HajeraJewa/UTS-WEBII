<x-default-layout title="Gunung" section_title="Daftar Gunung">


    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @can('store-gunungs')
        <div class="flex justify-end mb-6">
            <a href="{{ route('gunungs.create') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition">
                <i class="ph ph-plus"></i>
                Tambah Gunung
            </a>
        </div>
    @endcan

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($gunungs as $gunung)
            <div class="relative bg-white border border-gray-200 rounded-xl shadow hover:shadow-lg transition flex flex-col overflow-hidden group">
                <a href="{{ route('gunungs.show', $gunung->id) }}" class="absolute inset-0 z-10"></a>

                @if ($gunung->gambar)
                    <img src="{{ asset($gunung->gambar) }}" alt="Gambar {{ $gunung->nama }}"
                        class="w-full h-48 object-cover" />
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                        Tidak ada gambar
                    </div>
                @endif

                <div class="p-4 flex flex-col flex-grow pointer-events-none">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $gunung->nama }}</h3>
                    <p class="text-sm text-gray-600 mb-1">📍 {{ $gunung->lokasi }}</p>
                    <p class="text-sm text-gray-600 mb-2">⛰️ {{ $gunung->ketinggian }} mdpl</p>
                    <span class="self-start px-3 py-1 text-xs font-semibold rounded-full 
                        {{ $gunung->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $gunung->status }}
                    </span>

                    <div class="mt-auto pt-4 flex justify-end items-center gap-2 relative z-20 pointer-events-auto">
                        @can('edit-gunungs')
                            <a href="{{ route('gunungs.edit', $gunung->id) }}"
                                class="text-yellow-500 hover:text-yellow-700 text-lg" title="Edit">
                                <i class="ph ph-pencil-simple"></i>
                            </a>
                        @endcan
                        @can('destroy-gunungs')
                            <form action="{{ route('gunungs.destroy', $gunung->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-lg" title="Hapus">
                                    <i class="ph ph-trash-simple"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Tidak ada data gunung.</p>
        @endforelse
    </div>

</x-default-layout>
