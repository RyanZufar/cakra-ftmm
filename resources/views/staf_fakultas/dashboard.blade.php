<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staf Fakultas - CAKRA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #073763; --accent: #741847; --bg-dark: #0A192F; --text-dark: #E0E6F1; --subtext-dark: #94A3B8; --card-bg: rgba(7, 55, 99, 0.1); }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-dark); color: var(--text-dark); }
        .main-container { display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: rgba(7, 55, 99, 0.15); backdrop-filter: blur(10px); border-right: 1px solid rgba(116, 24, 71, 0.2); padding: 1.5rem 1rem; position: fixed; height: 100vh; }
        .main-content { flex: 1; margin-left: 280px; padding: 2rem; }
        .brand-text .title { font-family: 'Orbitron', sans-serif; background: linear-gradient(90deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-sidebar .nav-link.active { background: linear-gradient(135deg, var(--primary), var(--accent)); color: white; }
        .dashboard-card { background: var(--card-bg); backdrop-filter: blur(10px); border: 1px solid rgba(116, 24, 71, 0.2); border-radius: 12px; padding: 1.5rem; height: 100%; }
        .table-custom thead th { background: rgba(7, 55, 99, 0.2); }
        .table-custom tbody tr:hover { background: rgba(7, 55, 99, 0.1); }
        .action-btn { background: rgba(116, 24, 71, 0.2); color: var(--text-dark); border: 1px solid rgba(116, 24, 71, 0.3); border-radius: 6px; padding: 4px 12px; font-size: 0.85rem; text-decoration: none; }
        .highlight-text { color: #7ca2c5; font-weight: 600; }
        .futuristic-icon { font-size: 2.4rem; color: #7ca2c5; }
        .futuristic-subtitle { font-size: 0.95rem; }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar" id="sidebar">
<<<<<<< HEAD
            {{-- (Sidebar Anda tetap sama, tidak ada yang diubah) --}}
        </div>

        <div class="main-content" id="mainContent">
            <div id="dashboard-content">
                <h2 class="dashboard-title">Dashboard Staf Keuangan Fakultas</h2>
                <p class="dashboard-subtitle">Selamat datang kembali, <span class="highlight-text">{{ $user->name }}</span>!</p>
=======
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
                    <a class="nav-link active" href="{{ route('staf_fakultas.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content" id="mainContent">
            <div>
                <h2 class="dashboard-title" style="font-family: 'Orbitron', sans-serif;">Dashboard Staf Keuangan</h2>
                <p class="dashboard-subtitle">Selamat datang kembali, <span class="highlight-text">{{ Auth::user()->name ?? 'Staf Fakultas' }}</span>!</p>
>>>>>>> 29d3f75 (semua)

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="dashboard-card h-100">
<<<<<<< HEAD
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0"><i class="bi bi-file-earmark-text me-2"></i> Antrian Verifikasi RAB</h5>
                                {{-- <a href="#" class="action-btn">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a> --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    {{-- (thead tidak berubah) --}}
                                    <tbody>
                                        {{-- PERUBAHAN 1: Loop data antrian RAB dari controller --}}
                                        @forelse ($antrianRab as $pengajuan)
                                        <tr>
                                            <td>
                                                <div>{{ $pengajuan->judul_kegiatan }}</div>
                                                <small class="text-muted">{{ $pengajuan->ormawa->nama_ormawa ?? 'Individu' }}</small>
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->diffForHumans() }}</td>
                                            <td class="text-right">
                                               <a href="{{ route('staf_fakultas.verifikasi.rab', $pengajuan->pengajuan_id) }}" class="action-btn">Verifikasi</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center">Tidak ada antrian verifikasi RAB.</td></tr>
=======
                            <h5 class="card-title mb-3" style="font-family: 'Orbitron', sans-serif;">
                                <i class="bi bi-file-earmark-text me-2"></i> Antrian Verifikasi RAB
                            </h5>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Pengajuan</th>
                                            <th>Ormawa</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($daftarPengajuanRab as $pengajuan)
                                            <tr>
                                                <td>{{ Str::limit($pengajuan->judul_kegiatan, 30) }}</td>
                                                <td><small class="text-muted">{{ $pengajuan->ormawa->nama_ormawa }}</small></td>
                                                <td class="text-end">
                                                    <a href="{{ route('staf_fakultas.verifikasi.rab', $pengajuan->pengajuan_id) }}" class="action-btn">
                                                        Verifikasi
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4">Tidak ada antrian verifikasi RAB.</td>
                                            </tr>
>>>>>>> 29d3f75 (semua)
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="dashboard-card h-100">
<<<<<<< HEAD
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0"><i class="bi bi-folder-check me-2"></i> Antrian Verifikasi LPJ</h5>
                                {{-- <a href="#" class="action-btn">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a> --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    {{-- (thead tidak berubah) --}}
                                    <tbody>
                                        {{-- PERUBAHAN 2: Loop data antrian LPJ dari controller --}}
                                        @forelse ($antrianLpj as $pengajuan)
                                        <tr>
                                            <td>
                                                <div>{{ $pengajuan->judul_kegiatan }}</div>
                                                <small class="text-muted">{{ $pengajuan->ormawa->nama_ormawa ?? 'Individu' }}</small>
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($pengajuan->lpj->tanggal_lapor)->diffForHumans() }}</td>
                                            <td class="text-right">
                                                <a href="#" class="action-btn">Verifikasi</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center">Tidak ada antrian verifikasi LPJ.</td></tr>
=======
                            <h5 class="card-title mb-3" style="font-family: 'Orbitron', sans-serif;">
                                <i class="bi bi-folder-check me-2"></i> Antrian Verifikasi LPJ
                            </h5>
                            <div class="table-responsive">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Pengajuan</th>
                                            <th>Ormawa</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($daftarPengajuanLpj as $pengajuan)
                                            <tr>
                                                <td>{{ Str::limit($pengajuan->judul_kegiatan, 30) }}</td>
                                                <td><small class="text-muted">{{ $pengajuan->ormawa->nama_ormawa }}</small></td>
                                                <td class="text-end">
                                                    <a href="{{ route('staf_fakultas.verifikasi.lpj', $pengajuan->pengajuan_id) }}" class="action-btn">
                                                        Verifikasi
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4">Tidak ada antrian verifikasi LPJ.</td>
                                            </tr>
>>>>>>> 29d3f75 (semua)
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 g-4">
                    {{-- PERUBAHAN 3: Statistik dibuat dinamis --}}
                    <div class="col-md-3">
                        <div class="dashboard-card text-center">
                            <i class="bi bi-clock-history futuristic-icon mb-2"></i>
<<<<<<< HEAD
                            <h4 class="highlight-text">{{ $stats['menunggu_verifikasi'] }}</h4>
                            <p class="mb-0 futuristic-subtitle">Total Antrian</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card text-center">
                            <i class="bi bi-building futuristic-icon mb-2"></i>
                            <h4 class="highlight-text">{{ $stats['total_ormawa'] }}</h4>
                            <p class="mb-0 futuristic-subtitle">ORMAWA Terdaftar</p>
                        </div>
                    </div>
                    {{-- Anda bisa menambahkan 2 kartu statistik lainnya di sini --}}
=======
                            <h4 class="highlight-text">{{ $daftarPengajuanRab->count() + $daftarPengajuanLpj->count() }}</h4>
                            <p class="mb-0 futuristic-subtitle">Menunggu Verifikasi</p>
                        </div>
                    </div>
                    {{-- Statistik lain bisa ditambahkan nanti --}}
>>>>>>> 29d3f75 (semua)
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>