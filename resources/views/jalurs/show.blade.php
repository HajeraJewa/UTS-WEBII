<x-default-layout title="Jalur" section_title="Detail Jalur">

    <div class="flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col gap-8">

            {{-- Header --}}
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-700 mb-2">Informasi Jalur</h2>
                <p class="text-gray-500 text-sm">Detail lengkap jalur pendakian</p>
            </div>

            {{-- Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Jalur --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Nama Jalur</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-signpost text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $jalur->nama }}</span>
                    </div>
                </div>

                {{-- Status --}}
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Status</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-check-circle text-gray-400 text-lg"></i>

                        @php
                            $badgeColor = match($jalur->status) {
                                'Aktif' => 'bg-green-100 text-green-700',
                                'Tidak Aktif' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-700'
                            };
                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                            {{ $jalur->status }}
                        </span>
                    </div>
                </div>

                {{-- Nama Gunung --}}
                <div class="flex flex-col gap-2 md:col-span-2">
                    <span class="text-sm text-gray-500">Gunung</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-mountains text-gray-400 text-lg"></i>
                        <span class="text-gray-800 font-semibold">{{ $jalur->gunung->nama }}</span>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('jalurs.index') }}"
                    class="px-6 py-2 rounded-lg border text-gray-600 border-gray-400 hover:bg-gray-100 transition">
                    Back
                </a>

                <a href="{{ route('jalurs.edit', $jalur->id) }}"
                    class="px-6 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold transition">
                    <i class="ph ph-note-pencil mr-2"></i> Edit
                </a>
            </div>

        </div>
    </div>

</x-default-layout>
