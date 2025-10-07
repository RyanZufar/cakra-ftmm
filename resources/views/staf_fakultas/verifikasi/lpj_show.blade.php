<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi LPJ - CAKRA FTMM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #073763; --accent: #741847; --bg-dark: #0A192F; --text-dark: #E0E6F1; --subtext-dark: #94A3B8; --card-bg: rgba(7, 55, 99, 0.1); }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-dark); color: var(--text-dark); }
        .main-container { display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: rgba(7, 55, 99, 0.15); backdrop-filter: blur(10px); border-right: 1px solid rgba(116, 24, 71, 0.2); padding: 1.5rem 1rem; position: fixed; height: 100vh; }
        .main-content { flex: 1; margin-left: 280px; padding: 2rem; }
        .verifikasi-card { background: var(--card-bg); backdrop-filter: blur(10px); border: 1px solid rgba(116, 24, 71, 0.2); border-radius: 12px; padding: 1.5rem; height: 100%; }
        .table-custom thead th { background: rgba(7, 55, 99, 0.2); }
        .table-custom tbody tr:hover { background: rgba(7, 55, 99, 0.1); }
        .action-btn { background: rgba(116, 24, 71, 0.2); color: var(--text-dark); border: 1px solid rgba(116, 24, 71, 0.3); border-radius: 6px; padding: 4px 12px; font-size: 0.85rem; text-decoration: none; }
        .text-accent { color: var(--accent); font-weight: 600; }
        .btn-success-custom, .btn-danger-custom { border-radius: 8px; padding: 12px 30px; border: none; font-weight: 600; }
        .btn-success-custom { background: linear-gradient(135deg, #28a745, #20c997); color: white; }
        .btn-danger-custom { background: linear-gradient(135deg, #dc3545, #e83e8c); color: white; }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar" id="sidebar">
            <a class="brand-wrap" href="#">
                <div style="width: 42px; height: 42px; background: linear-gradient(135deg, var(--primary), var(--accent)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-calculator text-white"></i>
                </div>
                <span class="brand-text">
                    <span class="title">CAKRA</span>
                    <span class="subtitle">Staf Fakultas</span>
                </span>
            </a>
            <ul class="nav-sidebar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staf_fakultas.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content" id="mainContent">
            <div class="verifikasi-container">
                <a href="{{ route('staf_fakultas.dashboard') }}" class="text-muted text-decoration-none mb-3 d-inline-block"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
                <h2 class="verifikasi-title mb-3" style="font-family: 'Orbitron', sans-serif;">Verifikasi LPJ: {{ $pengajuan->judul_kegiatan }}</h2>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="verifikasi-card h-100">
                            <h5 class="card-title mb-4" style="font-family: 'Orbitron', sans-serif;">
                                <i class="bi bi-file-earmark-text me-2"></i> Rencana Anggaran (RAB)
                            </h5>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th class="text-end">Total Diajukan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengajuan->itemsRab as $itemRab)
                                            <tr>
                                                <td>{{ $itemRab->nama_item }}</td>
                                                <td class="text-end text-accent">Rp {{ number_format($itemRab->jumlah * $itemRab->harga_satuan, 0, ',', '.') }}</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="2" class="text-center py-3">Tidak ada data RAB.</td></tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-end text-accent">Rp {{ number_format($pengajuan->total_rab, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="verifikasi-card h-100">
                            <h5 class="card-title mb-4" style="font-family: 'Orbitron', sans-serif;">
                                <i class="bi bi-folder-check me-2"></i> Realisasi (LPJ)
                            </h5>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th class="text-end">Total Realisasi</th>
                                            <th class="text-center">Nota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengajuan->lpj->itemsLpj as $itemLpj)
                                        <tr>
                                            <td>{{ $itemLpj->nama_pengeluaran }}</td>
                                            <td class="text-end text-accent">Rp {{ number_format($itemLpj->jumlah_realisasi * $itemLpj->harga_realisasi, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $itemLpj->path_foto_nota) }}" target="_blank" class="action-btn">
                                                    Lihat Nota
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr><td colspan="3" class="text-center py-3">Tidak ada data realisasi LPJ.</td></tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-end text-accent">Rp {{ number_format($pengajuan->lpj->total_realisasi, 0, ',', '.') }}</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="verifikasi-card mt-4">
                     <h5 class="card-title mb-4" style="font-family: 'Orbitron', sans-serif;">
                        <i class="bi bi-clipboard-check me-2"></i> Tindakan Verifikasi LPJ
                    </h5>
                    <form method="POST" action="{{ route('staf_fakultas.verifikasi.lpj.update', $pengajuan->pengajuan_id) }}">
                        @csrf
                        <div class="mb-4">
                             <label for="komentar" class="form-label">Komentar / Revisi</label>
                            <textarea id="komentar" name="komentar" class="form-control glass-card" rows="4" placeholder="Wajib diisi jika meminta revisi..." style="background: rgba(7, 55, 99, 0.1); color: var(--text-dark); border: 1px solid rgba(116, 24, 71, 0.2);"></textarea>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" name="aksi" value="setujui" class="btn-success-custom flex-fill">
                                <i class="bi bi-check-circle me-2"></i> Setujui LPJ & Selesaikan Pengajuan
                            </button>
                            <button type="submit" name="aksi" value="revisi" class="btn-danger-custom flex-fill">
                                <i class="bi bi-send me-2"></i> Kirim Revisi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>