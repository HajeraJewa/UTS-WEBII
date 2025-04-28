<x-default-layout title="Pemesanan" section_title="Edit Pemesanan Tiket">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Form --}}
        <form action="{{ route('pemesanans.update', $pemesanan->id) }}" method="POST"
            class="bg-white border border-gray-200 rounded-xl shadow-md p-8 flex flex-col gap-8 col-span-2">
            @csrf
            @method('PUT')

            {{-- Section Judul --}}
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Form Edit Pemesanan Tiket</h2>
                <p class="text-gray-500 text-sm">Update data pemesanan tiket sesuai kebutuhan</p>
            </div>

            {{-- Input Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Pemesan --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="nama_pemesan" class="text-sm font-semibold text-gray-700">Nama Pemesan</label>
                    <input type="text" id="nama_pemesan" name="nama_pemesan"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Nama Pemesan" value="{{ old('nama_pemesan', $pemesanan->nama_pemesan) }}">
                    @error('nama_pemesan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- No. HP --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="no_hp" class="text-sm font-semibold text-gray-700">No. HP</label>
                    <input type="text" id="no_hp" name="no_hp"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Nomor HP" value="{{ old('no_hp', $pemesanan->no_hp) }}">
                    @error('no_hp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jumlah Tiket --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="jumlah_tiket" class="text-sm font-semibold text-gray-700">Jumlah Tiket</label>
                    <input type="number" id="jumlah_tiket" name="jumlah_tiket"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        placeholder="Jumlah Tiket" value="{{ old('jumlah_tiket', $pemesanan->jumlah_tiket) }}">
                    @error('jumlah_tiket')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jadwal Pendakian --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="jadwal_pendakian_id" class="text-sm font-semibold text-gray-700">Jadwal Pendakian</label>
                    <select name="jadwal_pendakian_id" id="jadwal_pendakian_id"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        <option value="" disabled>Pilih Jadwal Pendakian</option>
                        @foreach ($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}" {{ old('jadwal_pendakian_id', $pemesanan->jadwal_pendakian_id) == $jadwal->id ? 'selected' : '' }}>
                                {{ $jadwal->gunung->nama }} - {{ $jadwal->jalur->nama }} ({{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }})
                            </option>
                        @endforeach
                    </select>
                    @error('jadwal_pendakian_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Status Pemesanan --}}
                <div class="flex flex-col gap-2 bg-gray-50 p-4 rounded-lg border">
                    <label for="status" class="text-sm font-semibold text-gray-700">Status Pemesanan</label>
                    <select name="status" id="status"
                        class="px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        <option value="Tertunda" {{ old('status', $pemesanan->status) == 'Tertunda' ? 'selected' : '' }}>Tertunda</option>
                        <option value="Terkonfirmasi" {{ old('status', $pemesanan->status) == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                        <option value="Dibatalkan" {{ old('status', $pemesanan->status) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('pemesanans.index') }}"
                    class="inline-flex items-center px-5 py-2 text-gray-600 border border-gray-400 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition">
                    <i class="ph ph-floppy-disk mr-2"></i>
                    Update
                </button>
            </div>

        </form>

    </div>

</x-default-layout>
