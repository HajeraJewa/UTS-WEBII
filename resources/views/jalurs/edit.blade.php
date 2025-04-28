<x-default-layout title="Edit Jalur" section_title="Edit Jalur Pendakian">

    <form action="{{ route('jalurs.update', $jalur->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Input Fields --}}
        <div class="grid sm:grid-cols-2 gap-6">

            {{-- Nama Jalur --}}
            <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                <label for="nama" class="text-sm font-semibold text-gray-700">Nama Jalur</label>
                <input type="text" name="nama" id="nama" value="{{ $jalur->nama }}"
                    class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                    required>
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Gunung --}}
            <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                <label for="gunung_id" class="text-sm font-semibold text-gray-700">Gunung</label>
                <select name="gunung_id" id="gunung_id"
                    class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                    required>
                    @foreach ($gunungs as $gunung)
                        <option value="{{ $gunung->id }}" @selected($gunung->id == $jalur->gunung_id)>{{ $gunung->nama }}
                        </option>
                    @endforeach
                </select>
                @error('gunung_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>

        {{-- Status --}}
        <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
            <label for="status" class="text-sm font-semibold text-gray-700">Status</label>
            <select name="status" id="status"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                required>
                <option value="Aktif" @selected($jalur->status == 'Aktif')>Aktif</option>
                <option value="Tidak Aktif" @selected($jalur->status == 'Tidak Aktif')>Tidak Aktif</option>
            </select>
            @error('status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end gap-4 mt-6">

            {{-- Button --}}
            <div class="flex justify-end mt-6 gap-4">
                <a href="{{ route('jalurs.index') }}"
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