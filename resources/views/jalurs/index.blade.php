<x-default-layout title="Jalur Pendakian" section_title="Daftar Jalur Pendakian">

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    @can('store-jalurs')
        <div class="flex justify-end mb-6">
            <a href="{{ route('jalurs.create') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-all">
                <i class="ph ph-plus"></i>
                Tambah Jalur
            </a>
        </div>
    @endcan

    {{-- Tabel Jalur Pendakian --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-300 text-gray-700">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">#</th>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">Nama Jalur</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Gunung</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Status</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($jalurs as $jalur)
                    <tr class="hover:bg-green-50 transition">
                        <td class="border border-gray-300 px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-6 py-4">{{ $jalur->nama }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">{{ $jalur->gunung->nama ?? '-' }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                {{ $jalur->status == 'Aktif' ? 'bg-green-100 text-green-800' : ($jalur->status == 'Tidak Aktif' ? 'bg-gray-200 text-gray-700' : 'bg-red-100 text-red-800') }}">
                                {{ $jalur->status }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                @can('view-jalurs')
                                    <a href="{{ route('jalurs.show', $jalur->id) }}"
                                        class="text-blue-500 hover:text-blue-700 text-xl" title="Lihat Detail">
                                        <i class="ph ph-eye"></i>
                                    </a>
                                @endcan
                                @can('edit-jalurs')
                                    <a href="{{ route('jalurs.edit', $jalur->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700 text-xl" title="Edit Jalur">
                                        <i class="ph ph-pencil-simple"></i>
                                    </a>
                                @endcan
                                @can('destroy-jalurs')
                                    <form action="{{ route('jalurs.destroy', $jalur->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xl" title="Hapus Jalur">
                                            <i class="ph ph-trash-simple"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-6 py-6 text-center text-gray-400">
                            Tidak ada data jalur pendakian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-default-layout>
