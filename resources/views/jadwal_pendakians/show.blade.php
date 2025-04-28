<x-default-layout title="Jadwal Pendakian" section_title="Detail Jadwal Pendakian">

    <div class="flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col gap-8">

            {{-- Header --}}
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-700 mb-2">Informasi Jadwal Pendakian</h2>
                <p class="text-gray-500 text-sm">Berikut adalah data lengkap mengenai jadwal pendakian yang dipilih</p>
            </div>

            {{-- Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Gunung --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Nama Gunung</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-mountains text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $jadwal->gunung->nama }}</span>
                    </div>
                </div>

                {{-- Nama Jalur --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Nama Jalur</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-map-pin text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $jadwal->jalur->nama }}</span>
                    </div>
                </div>

                {{-- Tanggal Pendakian --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Tanggal Pendakian</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-calendar text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }}</span>
                    </div>
                </div>

                {{-- Kuota --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Kuota</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-users text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $jadwal->kuota }} orang</span>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('jadwal_pendakians.index') }}"
                    class="px-6 py-2 rounded-lg border text-gray-600 border-gray-400 hover:bg-gray-100 transition">
                    Kembali
                </a>

                <a href="{{ route('jadwal_pendakians.edit', $jadwal->id) }}"
                    class="px-6 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold transition">
                    <i class="ph ph-note-pencil mr-2"></i> Edit
                </a>
            </div>

        </div>
    </div>

</x-default-layout>
