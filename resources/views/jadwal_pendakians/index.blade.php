<x-default-layout title="Jadwal Pendakian" section_title="Daftar Jadwal Pendakian">

    {{-- Alert Success --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    @can('store-jadwal-pendakians')
        <div class="flex justify-end mb-6">
            <a href="{{ route('jadwal_pendakians.create') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-all">
                <i class="ph ph-plus"></i>
                Tambah Jadwal Pendakian
            </a>
        </div>
    @endcan

    {{-- Tabel Jadwal Pendakian --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-300 text-gray-700">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">#</th>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">Gunung</th>
                    <th class="border border-gray-300 px-6 py-3 text-left text-xs font-bold uppercase">Jalur</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Tanggal Pendakian</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Kuota</th>
                    <th class="border border-gray-300 px-6 py-3 text-center text-xs font-bold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($jadwals as $jadwal)
                    <tr class="hover:bg-green-50 transition">
                        <td class="border border-gray-300 px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-6 py-4">{{ $jadwal->gunung->nama }}</td>
                        <td class="border border-gray-300 px-6 py-4">{{ $jadwal->jalur->nama }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }}
                        </td>
                        <td class="border border-gray-300 px-6 py-4 text-center">{{ $jadwal->kuota }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                @can('view-jadwal-pendakians')
                                    <a href="{{ route('jadwal_pendakians.show', $jadwal->id) }}"
                                        class="text-blue-500 hover:text-blue-700 text-xl" title="Lihat Detail">
                                        <i class="ph ph-eye"></i>
                                    </a>
                                @endcan
                                @can('edit-jadwal-pendakians')
                                    <a href="{{ route('jadwal_pendakians.edit', $jadwal->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700 text-xl" title="Edit Jadwal">
                                        <i class="ph ph-pencil-simple"></i>
                                    </a>
                                @endcan
                                @can('destroy-jadwal-pendakians')
                                    <form action="{{ route('jadwal_pendakians.destroy', $jadwal->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xl" title="Hapus Jadwal">
                                            <i class="ph ph-trash-simple"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-6 py-6 text-center text-gray-400">
                            Tidak ada data jadwal pendakian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-default-layout>
