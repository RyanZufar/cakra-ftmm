@extends('layouts.app') {{-- Pastikan nama layout Anda 'app.blade.php' atau sesuaikan --}}

@section('title', 'Verifikasi RAB')

@section('content')
<<<<<<< HEAD
<div class="container px-4 py-6">
    <h2 class="text-xl font-bold text-yellow-400 mb-4">📑 Detail Verifikasi RAB</h2>
    <p class="text-gray-400 mb-6">Periksa kesesuaian item dan anggaran yang diajukan oleh mahasiswa.</p>

    {{-- Info Pengajuan --}}
    <div class="bg-[#1e293b] rounded-xl p-6 shadow-lg mb-8">
         <div class="grid md:grid-cols-3 gap-4 text-sm">
            <div>
                <p class="text-gray-400">Judul Kegiatan</p>
                <p class="font-semibold text-white">{{ $pengajuan->judul_kegiatan }}</p>
            </div>
            <div>
                <p class="text-gray-400">Ormawa Pengaju</p>
                <p class="font-semibold text-white">{{ $pengajuan->ormawa->nama_ormawa }}</p>
            </div>
             <div>
                <p class="text-gray-400">Tanggal Pengajuan</p>
                <p class="font-semibold text-white">{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d F Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Tabel RAB --}}
    <div class="bg-[#1e293b] rounded-xl p-6 shadow-lg">
        <h4 class="text-yellow-400 font-semibold mb-4">Rincian Anggaran</h4>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-sm text-gray-300">
                <thead class="text-gray-400 border-b border-gray-600">
                    <tr>
                        <th class="py-2 text-left">Item</th>
                        <th class="py-2 text-center">Jumlah</th>
                        <th class="py-2 text-center">Satuan</th>
                        <th class="py-2 text-right">Harga Satuan</th>
                        <th class="py-2 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Mengganti data statis dengan loop dari controller --}}
                    @forelse ($pengajuan->itemsRab as $item)
                        <tr class="hover:bg-[#334155] transition border-b border-gray-700">
                            <td class="py-3">{{ $item->nama_item }}</td>
                            <td class="py-3 text-center">{{ $item->jumlah }}</td>
                            <td class="py-3 text-center">{{ $item->satuan }}</td>
                            <td class="py-3 text-right">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td class="py-3 text-right text-yellow-400">Rp {{ number_format($item->jumlah * $item->harga_satuan, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada item RAB untuk pengajuan ini.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="font-bold">
                    <tr>
                        <td colspan="4" class="pt-4 text-right">Total RAB Diajukan:</td>
                        <td class="pt-4 text-right text-yellow-400 text-lg">Rp {{ number_format($pengajuan->total_rab, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
=======
<div class="container px-4 py-6 mx-auto">
    {{-- Tombol Kembali untuk Navigasi Mudah --}}
    <a href="{{ route('staf_fakultas.dashboard') }}" class="text-gray-400 hover:text-white mb-4 inline-block">
        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
    </a>
    <h2 class="text-2xl font-bold text-yellow-400 mb-2" style="font-family: 'Orbitron', sans-serif;">Verifikasi Rencana Anggaran Biaya</h2>
    <p class="text-gray-400 mb-6">Review detail pengajuan dan RAB dari Ormawa.</p>

    <div class="bg-[#1e293b] rounded-xl p-6 shadow-lg mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Judul Kegiatan</p>
                <p class="font-semibold text-white">{{ $pengajuan->judul_kegiatan }}</p>
            </div>
            <div>
                <p class="text-gray-500">Ormawa</p>
                <p class="font-semibold text-white">{{ $pengajuan->ormawa->nama_ormawa }}</p>
            </div>
            <div>
                <p class="text-gray-500">Tanggal Pengajuan</p>
                <p class="font-semibold text-white">{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d M Y') }}</p>
            </div>
             <div>
                <p class="text-gray-500">Proposal</p>
                <a href="{{ $pengajuan->link_dokumen }}" target="_blank" class="font-semibold text-yellow-400 hover:text-yellow-300">
                    Lihat Dokumen <i class="bi bi-box-arrow-up-right ms-1"></i>
                </a>
            </div>
        </div>
>>>>>>> 29d3f75 (semua)
    </div>

    <div class="bg-[#1e293b] rounded-xl p-6 shadow-lg">
        <h3 class="text-lg font-bold text-yellow-400 mb-4" style="font-family: 'Orbitron', sans-serif;">Detail Anggaran</h3>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-sm text-gray-300">
                <thead class="text-gray-400 border-b border-gray-600">
                    <tr>
                        <th class="p-2 text-left">Item</th>
                        <th class="p-2 text-center">Jumlah</th>
                        <th class="p-2 text-center">Satuan</th>
                        <th class="p-2 text-right">Harga Satuan</th>
                        <th class="p-2 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Perulangan untuk setiap item RAB --}}
                    @forelse ($pengajuan->itemsRab as $item)
                        <tr class="hover:bg-[#334155] transition">
                            <td class="p-2">{{ $item->nama_item }}</td>
                            <td class="p-2 text-center">{{ $item->jumlah }}</td>
                            <td class="p-2 text-center">{{ $item->satuan }}</td>
                            <td class="p-2 text-right">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td class="p-2 text-right text-yellow-400 font-semibold">Rp {{ number_format($item->jumlah * $item->harga_satuan, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        {{-- Pesan jika tidak ada item RAB --}}
                        <tr>
                            <td colspan="5" class="text-center p-4">Tidak ada item RAB untuk pengajuan ini.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="border-t-2 border-gray-600 font-bold">
                    <tr>
                        <td colspan="4" class="p-2 text-right">Total Diajukan</td>
                        <td class="p-2 text-right text-yellow-400 text-lg">Rp {{ number_format($pengajuan->total_rab, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="bg-[#1e293b] rounded-xl p-6 shadow-lg mt-6">
        <h3 class="text-lg font-bold text-yellow-400 mb-4" style="font-family: 'Orbitron', sans-serif;">Tindakan Verifikasi</h3>
        <form method="POST" action="{{ route('staf_fakultas.verifikasi.rab.update', $pengajuan->pengajuan_id) }}">
            @csrf
            <div class="mb-4">
                <label for="komentar" class="block text-sm font-medium text-gray-400 mb-1">Komentar / Catatan Revisi</label>
                <textarea id="komentar" name="komentar" rows="4"
                          class="w-full rounded-lg bg-[#111827] text-white border border-gray-700 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                          placeholder="Wajib diisi jika meminta revisi atau menolak pengajuan..."></textarea>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit" name="aksi" value="setujui"
                        class="w-full sm:w-auto px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold flex items-center justify-center gap-2 transition">
                    <i class="bi bi-check-circle"></i> Setujui
                </button>
                <button type="submit" name="aksi" value="revisi"
                        class="w-full sm:w-auto px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold flex items-center justify-center gap-2 transition">
                    <i class="bi bi-pencil-square"></i> Minta Revisi
                </button>
                <button type="submit" name="aksi" value="tolak"
                        class="w-full sm:w-auto px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold flex items-center justify-center gap-2 transition">
                    <i class="bi bi-x-circle"></i> Tolak
                </button>
            </div>
        </form>
    </div>

</div>
@endsection