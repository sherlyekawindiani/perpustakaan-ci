<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f3fbf7; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background-color: #0d5c47; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(13, 92, 71, 0.06); background: #ffffff; }
        .table-custom-thead { background-color: #e2f6ee; color: #0d5c47; font-weight: 600; }
        .btn-mint { background-color: #2bb673; color: white; border-radius: 8px; font-weight: 500; }
        .btn-mint:hover { background-color: #22945b; color: white; }
        .btn-action-edit { background-color: #e2f6ee; color: #0d5c47; border: none; }
        .btn-action-edit:hover { background-color: #0d5c47; color: white; }
        .btn-action-delete { background-color: #ffebee; color: #c62828; border: none; }
        .btn-action-delete:hover { background-color: #c62828; color: white; }
        .badge-stock { background-color: #e2f6ee; color: #0d5c47; padding: 6px 12px; border-radius: 20px; font-weight: 600; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom mb-5 shadow-sm">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-book-half me-2"></i> SMART Library</span>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 style="color: #0d5c47; font-weight: 700;" class="mb-1"> DATA KOLEKSI BUKU </h2>
            <p class="text-muted small">Kelola data buku perpustakaan secara real-time</p>
        </div>
        <a href="/buku/tambah" class="btn btn-mint px-4 py-2"><i class="bi bi-plus-lg me-2"></i>Tambah Buku</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm mb-4" style="background-color: #e2f6ee; color: #0d5c47; border-radius: 10px;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card card-custom p-4">
        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead>
                    <tr class="table-custom-thead text-center">
                        <th class="py-3" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">No</th>
                        <th class="py-3">ISBN</th>
                        <th class="py-3 text-start">Judul</th>
                        <th class="py-3 text-start">Penulis</th>
                        <th class="py-3">Tahun</th>
                        <th class="py-3">Stok</th>
                        <th class="py-3" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buku)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">Belum ada koleksi data buku.</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; ?>
                        <?php foreach ($buku as$b): ?>
                            <tr class="text-center">
                                <td class="fw-bold text-muted"><?= $no++ ?></td>
                                <td class="text-secondary"><?= esc($b['isbn']) ?></td>
                                <td class="text-start fw-semibold" style="color: #0d5c47;"><?= esc($b['judul']) ?></td>
                                <td class="text-start text-secondary"><?= esc($b['penulis']) ?></td>
                                <td><span class="badge bg-light text-dark px-2 py-1 rounded"><?= esc($b['tahun']) ?></span></td>
                                <td><span class="badge badge-stock"><?= esc($b['stok']) ?> Pcs</span></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/buku/edit/<?= $b['id'] ?>" class="btn btn-sm btn-action-edit px-3 py-2 rounded-3"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/buku/hapus/<?= $b['id'] ?>" class="btn btn-sm btn-action-delete px-3 py-2 rounded-3" onclick="return confirm('Yakin ingin menghapus buku ini?')"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>