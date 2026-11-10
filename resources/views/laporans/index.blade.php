<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Laporan Banjir</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('laporans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">+ Buat Laporan Baru</a>
                </div>

                <table class="w-full border-collapse border text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Foto</th>
                            <th class="border p-2">Pelapor</th>
                            <th class="border p-2">Lokasi & Kecamatan</th>
                            <th class="border p-2">Tinggi Air</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans as $laporan)
                            <tr>
                                <td class="border p-2">
                                    <img src="{{ asset('storage/' . $laporan->foto) }}" class="w-16 h-16 object-cover rounded border">
                                </td>
                                <td class="border p-2">{{ $laporan->nama_pelapor }}<br><span class="text-xs text-gray-500">{{ $laporan->no_hp }}</span></td>
                                <td class="border p-2">{{ $laporan->lokasi }}, {{ $laporan->kecamatan }}</td>
                                <td class="border p-2">{{ $laporan->tinggi_air }} cm</td>
                                <td class="border p-2">
                                    <span class="px-2 py-1 text-xs rounded text-white {{ $laporan->status == 'Menunggu' ? 'bg-yellow-500' : ($laporan->status == 'Diproses' ? 'bg-blue-500' : 'bg-green-500') }}">
                                        {{ $laporan->status }}
                                    </span>
                                </td>
                                <td class="border p-2 space-x-2">
                                    <a href="{{ route('laporans.show', $laporan) }}" class="text-blue-600">Detail</a>
                                    @auth
                                        <a href="{{ route('laporans.edit', $laporan) }}" class="text-yellow-600">Edit</a>
                                        <form action="{{ route('laporans.destroy', $laporan) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus laporan ini?')" class="text-red-600">Hapus</button>
                                        </form>
                                    @endauth
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-2 text-center text-gray-500">Belum ada data laporan banjir.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $laporans->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>