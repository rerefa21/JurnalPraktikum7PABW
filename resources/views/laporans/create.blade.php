<x-guest-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md my-8">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Form Laporan Banjir BPBD</h2>
        
        <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Nama Pelapor</label>
                <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="w-full border-gray-300 rounded-md" required>
                @error('nama_pelapor') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">No. HP / WhatsApp</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full border-gray-300 rounded-md" required>
                @error('no_hp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Lokasi / Alamat</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full border-gray-300 rounded-md" required>
                    @error('lokasi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="w-full border-gray-300 rounded-md" required>
                    @error('kecamatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Tinggi Air (cm)</label>
                <input type="number" name="tinggi_air" value="{{ old('tinggi_air') }}" class="w-full border-gray-300 rounded-md" required>
                @error('tinggi_air') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Keterangan / Kondisi Lapangan</label>
                <textarea name="keterangan" class="w-full border-gray-300 rounded-md" rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block font-medium text-sm text-gray-700">Unggah Foto Kondisi (JPG/PNG, Max 2MB)</label>
                <input type="file" name="foto" accept="image/*" class="w-full border-gray-300 rounded-md" required>
                @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Kirim Laporan</button>
        </form>
    </div>
</x-guest-layout>