<x-default-layout title="Dashboard" section_title="Dashboard">
    <!-- Statistik Cards -->
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8 mb-12">
        <!-- Card Total Gunung -->
        <div
            class="p-6 rounded-xl shadow-lg bg-white border-t-4 border-green-500 hover:scale-105 transform transition duration-300 ease-in-out cursor-pointer">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-4 rounded-full">
                    <i class="ph ph-mountains text-green-600 text-4xl"></i>
                </div>
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Gunung</div>
                    <div class="text-3xl font-extrabold text-green-700">{{ $totalGunung }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Jalur -->
        <div
            class="p-6 rounded-xl shadow-lg bg-white border-t-4 border-blue-500 hover:scale-105 transform transition duration-300 ease-in-out cursor-pointer">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-4 rounded-full">
                    <i class="ph ph-signpost text-blue-600 text-4xl"></i>
                </div>
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Jalur Pendakian</div>
                    <div class="text-3xl font-extrabold text-blue-700">{{ $totalJalur }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Jadwal -->
        <div
            class="p-6 rounded-xl shadow-lg bg-white border-t-4 border-yellow-500 hover:scale-105 transform transition duration-300 ease-in-out cursor-pointer">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-4 rounded-full">
                    <i class="ph ph-calendar-blank text-yellow-600 text-4xl"></i>
                </div>
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Jadwal Pendakian</div>
                    <div class="text-3xl font-extrabold text-yellow-700">{{ $totalJadwal }}</div>
                </div>
            </div>
        </div>

        <!-- Card Total Tiket -->
        <div
            class="p-6 rounded-xl shadow-lg bg-white border-t-4 border-red-500 hover:scale-105 transform transition duration-300 ease-in-out cursor-pointer">
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-4 rounded-full">
                    <i class="ph ph-ticket text-red-600 text-4xl"></i>
                </div>
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Tiket Dipesan</div>
                    <div class="text-3xl font-extrabold text-red-700">{{ $totalPemesanan }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Jadwal Pendakian -->
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-3">
            <h2 class="text-xl font-bold text-green-700 tracking-wide">Jadwal Pendakian Terbaru</h2>
            <a href="{{ route('jadwal_pendakians.index') }}"
                class="text-green-600 hover:text-green-800 font-semibold text-sm transition">Lihat Semua &rarr;</a>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-gray-700 text-sm">
                <thead class="bg-gradient-to-r from-green-600 to-green-400 text-white">
                    <tr>
                        <th scope="col" class="py-3 px-6 text-left uppercase tracking-wider font-semibold">#</th>
                        <th scope="col" class="py-3 px-6 text-left uppercase tracking-wider font-semibold">Gunung</th>
                        <th scope="col" class="py-3 px-6 text-left uppercase tracking-wider font-semibold">Jalur</th>
                        <th scope="col" class="py-3 px-6 text-center uppercase tracking-wider font-semibold">Tanggal</th>
                        <th scope="col" class="py-3 px-6 text-center uppercase tracking-wider font-semibold">Kuota</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($jadwals as $jadwal)
                        <tr class="hover:bg-green-50 cursor-pointer transition">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6 font-medium">{{ $jadwal->gunung->nama }}</td>
                            <td class="py-4 px-6">{{ $jadwal->jalur->nama }}</td>
                            <td class="py-4 px-6 text-center">
                                {{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }}
                            </td>
                            <td class="py-4 px-6 text-center">{{ $jadwal->kuota }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-400 italic">Belum ada jadwal pendakian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
