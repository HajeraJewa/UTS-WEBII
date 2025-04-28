<x-default-layout title="Gunung" section_title="Tambah Gunung Baru">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Form --}}
        <form action="{{ route('gunungs.store') }}" method="POST"
            class="bg-white border border-gray-200 rounded-xl shadow-md p-8 flex flex-col gap-8 col-span-2">
            @csrf

            {{-- Section Judul --}}
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Form Tambah Gunung</h2>
                <p class="text-gray-500 text-sm">Isi data gunung dengan lengkap di bawah ini</p>
            </div>

            {{-- Input Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Gunung --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="nama" class="text-sm font-semibold text-gray-700">Nama Gunung</label>
                    <input type="text" id="nama" name="nama"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Contoh: Gunung Semeru" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="lokasi" class="text-sm font-semibold text-gray-700">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Contoh: Jawa Timur" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Ketinggian --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="ketinggian" class="text-sm font-semibold text-gray-700">Ketinggian (mdpl)</label>
                    <input type="number" id="ketinggian" name="ketinggian"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Contoh: 3676" value="{{ old('ketinggian') }}">
                    @error('ketinggian')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="status" class="text-sm font-semibold text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        <option value="Meletus" {{ old('status') == 'Meletus' ? 'selected' : '' }}>Meletus</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('gunungs.index') }}"
                    class="inline-flex items-center px-5 py-2 text-gray-600 border border-gray-400 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition">
                    <i class="ph ph-floppy-disk mr-2"></i>
                    Simpan
                </button>
            </div>

        </form>

    </div>

</x-default-layout>
