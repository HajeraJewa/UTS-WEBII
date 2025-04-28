<x-default-layout title="Tambah Pemesanan" section_title="Tambah Pemesanan Tiket">

    <div class="max-w-3xl mx-auto bg-gradient-to-br from-green-400 to-green-500 shadow-xl rounded-lg p-8 space-y-8">

        {{-- Section Judul --}}
        <div class="text-center mb-6">
            <h2 class="text-3xl font-semibold text-white">Form Tambah Pemesanan Tiket</h2>
            <p class="text-white text-sm">Isi data di bawah ini untuk memesan tiket pendakian.</p>
        </div>

        {{-- Form --}}
        <form action="{{ route('pemesanans.store') }}" method="POST">
            @csrf

            {{-- Nama Pemesan --}}
            <div class="mb-6">
                <label for="nama_pemesan" class="block text-sm font-medium text-white">Nama Pemesan</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan"
                    class="mt-2 block w-full px-6 py-3 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Masukkan nama pemesan" value="{{ old('nama_pemesan') }}" required>
                @error('nama_pemesan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- No. HP --}}
            <div class="mb-6">
                <label for="no_hp" class="block text-sm font-medium text-white">No. HP</label>
                <input type="text" id="no_hp" name="no_hp"
                    class="mt-2 block w-full px-6 py-3 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Masukkan nomor HP" value="{{ old('no_hp') }}" required>
                @error('no_hp')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Jumlah Tiket --}}
            <div class="mb-6">
                <label for="jumlah_tiket" class="block text-sm font-medium text-white">Jumlah Tiket</label>
                <input type="number" id="jumlah_tiket" name="jumlah_tiket"
                    class="mt-2 block w-full px-6 py-3 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Masukkan jumlah tiket" value="{{ old('jumlah_tiket') }}" required>
                @error('jumlah_tiket')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Jadwal Pendakian --}}
            <div class="mb-6">
                <label for="jadwal_pendakian_id" class="block text-sm font-medium text-white">Jadwal Pendakian</label>
                <select name="jadwal_pendakian_id" id="jadwal_pendakian_id"
                    class="mt-2 block w-full px-6 py-3 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="" disabled selected>Pilih Jadwal Pendakian</option>
                    @foreach ($jadwals as $jadwal)
                        <option value="{{ $jadwal->id }}">
                            {{ $jadwal->gunung->nama }} - {{ $jadwal->jalur->nama }} ({{ \Carbon\Carbon::parse($jadwal->tanggal_pendakian)->format('d-m-Y') }})
                        </option>
                    @endforeach
                </select>
                @error('jadwal_pendakian_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status Pemesanan --}}
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-white">Status Pemesanan</label>
                <select name="status" id="status"
                    class="mt-2 block w-full px-6 py-3 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="Tertunda" {{ old('status') == 'Tertunda' ? 'selected' : '' }}>Tertunda</option>
                    <option value="Terkonfirmasi" {{ old('status') == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                    <option value="Dibatalkan" {{ old('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('pemesanans.index') }}"
                    class="inline-flex items-center px-6 py-3 text-gray-600 font-semibold text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-green-800 hover:bg-green-900 text-white font-semibold rounded-lg transition">
                    Simpan Pemesanan
                </button>
            </div>

        </form>

    </div>

</x-default-layout>
