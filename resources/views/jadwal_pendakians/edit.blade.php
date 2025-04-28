<x-default-layout title="Jadwal Pendakian" section_title="Edit Jadwal Pendakian">

    <form action="{{ route('jadwal_pendakians.update', $jadwal->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Input Fields --}}
        <div class="grid sm:grid-cols-2 gap-6">

            {{-- Gunung --}}
            <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                <label for="gunung_id" class="text-sm font-semibold text-gray-700">Gunung</label>
                <select name="gunung_id" id="gunung_id"
                    class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    @foreach ($gunungs as $gunung)
                        <option value="{{ $gunung->id }}" @if ($gunung->id == $jadwal->gunung_id) selected @endif>
                            {{ $gunung->nama }}
                        </option>
                    @endforeach
                </select>
                @error('gunung_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Jalur --}}
            <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                <label for="jalur_id" class="text-sm font-semibold text-gray-700">Jalur</label>
                <select name="jalur_id" id="jalur_id"
                    class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    @foreach ($jalurs as $jalur)
                        <option value="{{ $jalur->id }}" @if ($jalur->id == $jadwal->jalur_id) selected @endif>
                            {{ $jalur->nama }}
                        </option>
                    @endforeach
                </select>
                @error('jalur_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>

        {{-- Tanggal Pendakian --}}
        <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
            <label for="tanggal_pendakian" class="text-sm font-semibold text-gray-700">Tanggal Pendakian</label>
            <input type="date" name="tanggal_pendakian" id="tanggal_pendakian"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                value="{{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('Y-m-d') }}">
            @error('tanggal_pendakian')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Kuota --}}
        <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
            <label for="kuota" class="text-sm font-semibold text-gray-700">Kuota</label>
            <input type="number" name="kuota" id="kuota"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                value="{{ $jadwal->kuota }}">
            @error('kuota')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        {{-- Button --}}
        <div class="flex justify-end mt-6 gap-4">
                <a href="{{ route('jadwal_pendakians.index') }}"
                    class="inline-flex items-center px-5 py-2 text-gray-600 border border-gray-400 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>
                {{-- Button Simpan --}}
                <button type="submit"
                class="inline-flex items-center px-5 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition">
                    <i class="ph ph-floppy-disk mr-2"></i>
                    Update
                </button>
            </div>
    </form>

</x-default-layout>