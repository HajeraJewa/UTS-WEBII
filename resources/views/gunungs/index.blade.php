
<x-default-layout title="Gunung" section_title="Daftar Gunung">

    {{-- Alert Success --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Tombol Tambah Gunung --}}
    <div class="flex justify-end mb-6">
        <a href="{{ route('gunungs.create') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-all">
            <i class="ph ph-plus"></i>
            Tambah Gunung
        </a>
    </div>

    {{-- Tabel Data Gunung --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-300 text-gray-700">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">#</th>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">Nama Gunung</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Lokasi</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Ketinggian (mdpl)</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Status</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($gunungs as $gunung)
                    <tr class="hover:bg-green-50 transition">
                        <td class="border border-gray-300 px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-6 py-4">{{ $gunung->nama }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">{{ $gunung->lokasi }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">{{ $gunung->ketinggian }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                {{ $gunung->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $gunung->status }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('gunungs.show', $gunung->id) }}" class="text-blue-500 hover:text-blue-700 text-xl">
                                    <i class="ph ph-eye"></i>
                                </a>
                                <a href="{{ route('gunungs.edit', $gunung->id) }}" class="text-yellow-500 hover:text-yellow-700 text-xl">
                                    <i class="ph ph-pencil-simple"></i>
                                </a>
                                <form action="{{ route('gunungs.destroy', $gunung->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xl">
                                        <i class="ph ph-trash-simple"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-6 py-6 text-center text-gray-400">
                            Tidak ada data gunung.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-default-layout>


