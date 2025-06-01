<x-default-layout title="Gunung" section_title="Detail Gunung">

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col gap-10">

            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-700 mb-2">Informasi Gunung</h2>
                <p class="text-gray-500 text-sm">Berikut adalah data lengkap mengenai gunung yang dipilih</p>
            </div>

            <div class="flex justify-center">
                @if ($gunung->gambar)
                    <img src="{{ $gunung->gambar }}" alt="Gambar {{ $gunung->nama }}"
                        class="w-full max-w-md rounded-lg shadow-md object-cover" />
                @else
                    <div class="w-full max-w-md h-48 bg-gray-200 flex items-center justify-center rounded-lg">
                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $badgeColor = match ($gunung->status) {
                        'Aktif' => 'bg-green-100 text-green-700',
                        'Tidak Aktif' => 'bg-gray-100 text-gray-700',
                        'Meletus' => 'bg-red-100 text-red-700',
                        default => 'bg-gray-100 text-gray-700',
                    };
                @endphp

                @foreach ([
                    ['label' => 'Nama Gunung', 'value' => $gunung->nama, 'icon' => 'ph-mountains'],
                    ['label' => 'Lokasi', 'value' => $gunung->lokasi, 'icon' => 'ph-map-pin'],
                    ['label' => 'Ketinggian (mdpl)', 'value' => $gunung->ketinggian . ' meter', 'icon' => 'ph-arrow-up'],
                ] as $item)
                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-500">{{ $item['label'] }}</span>
                        <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                            <i class="ph {{ $item['icon'] }} text-gray-400 text-lg"></i>
                            <span class="text-gray-800 font-semibold">{{ $item['value'] }}</span>
                        </div>
                    </div>
                @endforeach

                <div class="flex flex-col gap-2">
                    <span class="text-sm text-gray-500">Status</span>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <i class="ph ph-fire-simple text-gray-400 text-lg"></i>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                            {{ $gunung->status }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('gunungs.index') }}"
                    class="px-6 py-2 rounded-lg border text-gray-600 border-gray-400 hover:bg-gray-100 transition">
                    Kembali
                </a>
                <a href="{{ route('gunungs.edit', $gunung->id) }}"
                    class="px-6 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold transition">
                    <i class="ph ph-note-pencil mr-2"></i> Edit
                </a>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Ulasan Pengguna</h3>

                @forelse ($gunung->reviews as $review)
                    <div class="p-4 mb-4 bg-gray-50 border border-gray-200 rounded-lg">
                        <div class="flex justify-between items-center mb-2 text-sm text-gray-600">
                            <div>
                                <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded">
                                    ⭐ {{ $review->rating }}/5
                                </span>
                            </div>
                            <div class="text-xs text-gray-500">{{ $review->created_at->format('d M Y') }}</div>
                        </div>
                        <p class="text-sm text-gray-800 italic mb-2">"{{ $review->comment }}"</p>
                        <p class="text-xs text-gray-500">Oleh: <span class="font-semibold">{{ $review->user->name }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Belum ada ulasan untuk gunung ini.</p>
                @endforelse
            </div>

            <div class="border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Beri Ulasan</h3>

                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="gunung_id" value="{{ $gunung->id }}">

                    {{-- Rating --}}
                    <div>
                        <label for="rating" class="block text-sm text-gray-600 mb-1">Rating</label>
                        <select name="rating" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-green-200">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label for="comment" class="block text-sm text-gray-600 mb-1">Komentar</label>
                        <textarea name="comment" rows="3" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-green-200">{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Kirim --}}
                    <button type="submit"
                        class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                        Kirim Ulasan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
