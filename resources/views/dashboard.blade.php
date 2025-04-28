<x-default-layout title="Dashboard" section_title="Dashboard">
    <!-- Statistik Cards -->
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <!-- Card Total Gunung -->
        <div
            class="p-6 rounded-xl shadow-md bg-white border-t-4 border-green-400 hover:scale-[1.03] transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="ph ph-mountains text-green-600 text-3xl"></i>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Total Gunung</div>
                    <div class="text-2xl font-bold text-green-700">{{ $totalGunung }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Jalur -->
        <div
            class="p-6 rounded-xl shadow-md bg-white border-t-4 border-blue-400 hover:scale-[1.03] transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="ph ph-signpost text-blue-600 text-3xl"></i>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Total Jalur Pendakian</div>
                    <div class="text-2xl font-bold text-blue-700">{{ $totalJalur }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Jadwal -->
        <div
            class="p-6 rounded-xl shadow-md bg-white border-t-4 border-yellow-400 hover:scale-[1.03] transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="ph ph-calendar-blank text-yellow-600 text-3xl"></i>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Total Jadwal Pendakian</div>
                    <div class="text-2xl font-bold text-yellow-700">{{ $totalJadwal }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Tiket -->
        <div
            class="p-6 rounded-xl shadow-md bg-white border-t-4 border-red-400 hover:scale-[1.03] transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="ph ph-ticket text-red-600 text-3xl"></i>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Total Tiket Dipesan</div>
                    <div class="text-2xl font-bold text-red-700">{{ $totalPemesanan }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Jadwal Pendakian -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold text-green-700">Jadwal Pendakian Terbaru</h2>
            <a href="{{ route('jadwal_pendakians.index') }}" class="text-sm text-green-600 hover:underline">Lihat
                Semua</a>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-gradient-to-r from-green-600 to-green-400 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left uppercase tracking-wider">#</th>
                        <th class="py-3 px-6 text-left uppercase tracking-wider">Gunung</th>
                        <th class="py-3 px-6 text-left uppercase tracking-wider">Jalur</th>
                        <th class="py-3 px-6 text-center uppercase tracking-wider">Tanggal</th>
                        <th class="py-3 px-6 text-center uppercase tracking-wider">Kuota</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($jadwals as $jadwal)
                        <tr class="hover:bg-green-50">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6">{{ $jadwal->gunung->nama }}</td>
                            <td class="py-4 px-6">{{ $jadwal->jalur->nama }}</td>
                            <td class="py-4 px-6 text-center">
                                {{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }}
                            </td>
                            <td class="py-4 px-6 text-center">{{ $jadwal->kuota }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">Belum ada jadwal pendakian.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>