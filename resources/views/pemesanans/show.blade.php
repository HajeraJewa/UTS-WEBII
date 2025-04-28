<x-default-layout title="Pemesanan Tiket" section_title="Detail Pemesanan">

    <div class="flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col gap-8">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-700">Informasi Pemesanan</h2>
                <p class="text-gray-500 text-sm">Berikut adalah data lengkap mengenai pemesanan tiket pendakian</p>
            </div>

            {{-- Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Pemesan --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Nama Pemesan</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-user text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $pemesanan->nama_pemesan }}</span>
                    </div>
                </div>

                {{-- No. HP --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">No. HP</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-phone text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $pemesanan->no_hp }}</span>
                    </div>
                </div>

                {{-- Jumlah Tiket --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Jumlah Tiket</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-ticket text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $pemesanan->jumlah_tiket }}</span>
                    </div>
                </div>

                {{-- Status --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Status Pemesanan</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-check-circle text-gray-400 text-lg"></i>

                        @php
                            $badgeColor = match ($pemesanan->status) {
                                'Tertunda' => 'bg-yellow-100 text-green-700',
                                'Terkonfirmasi' => 'bg-green-100 text-yellow-700',
                                'Dibatalkan' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-700'
                            };
                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                            {{ $pemesanan->status }}
                        </span>
                    </div>
                </div>

                {{-- Jadwal Pendakian --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Jadwal Pendakian</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-calendar text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">
                            {{ $pemesanan->jadwalPendakian->gunung->nama }} -
                            {{ $pemesanan->jadwalPendakian->jalur->nama }}
                            ({{ \Carbon\Carbon::parse($pemesanan->jadwalPendakian->tanggal_pendakian)->format('d-m-Y') }})
                        </span>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('pemesanans.index') }}"
                    class="px-6 py-2 rounded-lg border text-gray-600 border-gray-400 hover:bg-gray-100 transition">
                    Kembali
                </a>

                <a href="{{ route('pemesanans.edit', $pemesanan->id) }}"
                    class="px-6 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold transition">
                    <i class="ph ph-note-pencil mr-2"></i> Edit
                </a>
            </div>

        </div>
    </div>

</x-default-layout>