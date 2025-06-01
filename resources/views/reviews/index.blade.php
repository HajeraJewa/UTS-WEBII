<x-default-layout title="Review" section_title="Daftar Review">
    {{-- Alert Success --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($reviews as $review)
            <div class="bg-white rounded-xl shadow border p-4 flex flex-col">
                {{-- Header Gunung & Rating --}}
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-md font-bold text-gray-700">{{ $review->gunung->nama }}</h3>
                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">
                        ⭐ {{ $review->rating }}/5
                    </span>
                </div>

                {{-- Komentar --}}
                <p class="text-gray-600 text-sm mb-3 italic">"{{ $review->comment }}"</p>

                {{-- Footer: User & Tanggal --}}
                <div class="text-xs text-gray-500 mt-auto flex justify-between items-center">
                    <span>Oleh: <strong>{{ $review->user->name }}</strong></span>
                    <span>{{ $review->created_at->format('d M Y') }}</span>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-3 text-right">
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus review ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-500 hover:text-red-700 text-sm font-semibold transition">
                            <i class="ph ph-trash-simple"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada review.</p>
        @endforelse
    </div>
</x-default-layout>
