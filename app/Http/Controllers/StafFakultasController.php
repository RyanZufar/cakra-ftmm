<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Status;
use App\Models\HistoriStatus;
use App\Models\Lpj; // <-- Tambahkan model Lpj
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StafFakultasController extends Controller
{
    // --- fungsi index(), showRab(), showLpj() tetap sama ---
    public function index()
    {
        $statusVerifikasi = Status::where('nama_status', 'Verifikasi Fakultas')->first();
        $pengajuanRab = collect();
        if ($statusVerifikasi) {
            $pengajuanRab = Pengajuan::where('current_status_id', $statusVerifikasi->status_id)
                                    ->with(['ormawa', 'user'])
                                    ->orderBy('tanggal_pengajuan', 'desc')
                                    ->get();
        }
        $pengajuanLpj = Pengajuan::whereHas('lpj', function ($query) {
            $query->where('status_lpj', 'Menunggu Verifikasi');
        })->with(['ormawa', 'user', 'lpj'])
          ->orderBy('updated_at', 'desc')
          ->get();
        return view('staf_fakultas.dashboard', [
            'daftarPengajuanRab' => $pengajuanRab,
            'daftarPengajuanLpj' => $pengajuanLpj,
        ]);
    }
    public function showRab($id)
    {
        $pengajuan = Pengajuan::with(['ormawa', 'user', 'status', 'itemsRab'])
                             ->findOrFail($id);
        return view('staf_fakultas.verifikasi.rab_show', ['pengajuan' => $pengajuan]);
    }
    public function showLpj($id)
    {
        $pengajuan = Pengajuan::with(['ormawa', 'user', 'status', 'lpj.itemsLpj', 'itemsRab'])
                             ->findOrFail($id);
        if (!$pengajuan->lpj) {
            return redirect()->route('staf_fakultas.dashboard')->with('error', 'LPJ untuk pengajuan ini tidak ditemukan.');
        }
        return view('staf_fakultas.verifikasi.lpj_show', ['pengajuan' => $pengajuan]);
    }

    /**
     * 3. FUNGSI BARU: Memproses dan memperbarui status verifikasi RAB.
     */
    public function updateRabStatus(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'aksi' => ['required', 'string', Rule::in(['setujui', 'revisi', 'tolak'])],
            'komentar' => ['nullable', 'string', 'max:1000'],
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $user = Auth::user();

        // Tentukan status baru berdasarkan tombol yang diklik
        $newStatusName = '';
        if ($request->aksi === 'setujui') {
            $newStatusName = 'Disetujui';
        } elseif ($request->aksi === 'revisi') {
            $newStatusName = 'Revisi';
        } elseif ($request->aksi === 'tolak') {
            $newStatusName = 'Ditolak';
        }

        $newStatus = Status::where('nama_status', $newStatusName)->first();

        // Jika status tujuan tidak ditemukan di database, kembali dengan error
        if (!$newStatus) {
            return back()->with('error', 'Status tujuan tidak valid.');
        }

        // Update status di tabel pengajuan
        $pengajuan->current_status_id = $newStatus->status_id;
        $pengajuan->save();

        // Buat catatan di tabel histori_status
        HistoriStatus::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'status_id' => $newStatus->status_id,
            'diubah_oleh_user_id' => $user->user_id,
            'komentar' => $request->komentar,
            'timestamp' => now(),
        ]);

        // Arahkan kembali ke dashboard dengan pesan sukses
        return redirect()->route('staf_fakultas.dashboard')->with('success', 'Status pengajuan berhasil diperbarui!');
    }
    /**
     * FUNGSI BARU: Memproses dan memperbarui status verifikasi LPJ.
     */
    public function updateLpjStatus(Request $request, $id)
    {
        $request->validate([
            'aksi' => ['required', 'string', Rule::in(['setujui', 'revisi'])],
            'komentar' => ['required_if:aksi,revisi', 'nullable', 'string', 'max:1000'],
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $lpj = $pengajuan->lpj;

        if ($request->aksi === 'setujui') {
            $lpj->status_lpj = 'Selesai';
            // Juga update status utama pengajuan menjadi "Selesai"
            $statusSelesai = Status::where('nama_status', 'Selesai')->first();
            if ($statusSelesai) {
                $pengajuan->current_status_id = $statusSelesai->status_id;
                $pengajuan->save();
            }
        } elseif ($request->aksi === 'revisi') {
            $lpj->status_lpj = 'Revisi';
        }
        
        $lpj->save();

        // (Opsional) Anda bisa menambahkan pencatatan histori untuk LPJ di sini
        
        return redirect()->route('staf_fakultas.dashboard')->with('success', 'Status LPJ berhasil diperbarui!');
    }
}
