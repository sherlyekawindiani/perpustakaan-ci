<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f3fbf7; font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background-color: #0d5c47; }
        .card-form { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(13, 92, 71, 0.05); background: white; }
        .form-label { color: #0d5c47; font-weight: 600; font-size: 0.95rem; }
        .form-control:focus { border-color: #2bb673; box-shadow: 0 0 0 0.25rem rgba(43, 182, 115, 0.15); }
        .btn-mint { background-color: #2bb673; color: white; font-weight: 500; border-radius: 8px; }
        .btn-mint:hover { background-color: #22945b; color: white; }
        .btn-cancel { background-color: #e2f6ee; color: #0d5c47; border: none; font-weight: 500; border-radius: 8px; }
        .btn-cancel:hover { background-color: #d1efe2; color: #0d5c47; }
        .error-msg { font-size: 0.85rem; color: #dc3545; margin-top: 4px; font-weight: 500; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom mb-5 shadow-sm">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-book-half me-2"></i> SMART Library</span>
    </div>
</nav>

<div class="container" style="max-width: 700px;">
    <div class="mb-4">
        <h3 style="color: #0d5c47; font-weight: 700;"><i class="bi bi-pencil-square me-2"></i> Perbarui Data Buku</h3>
        <p class="text-muted">Perbarui data koleksi perpustakaan dengan benar</p>
    </div>

    <div class="card card-form p-4 md-5">
        <form action="/buku/update/<?= $buku['id'] ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nomor ISBN</label>
                <input type="text" name="isbn" class="form-control py-2 <?= session('errors.isbn') ? 'is-invalid' : '' ?>" value="<?= old('isbn', $buku['isbn']) ?>">
                <?php if (session('errors.isbn')) : ?>
                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i> <?= session('errors.isbn') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control py-2 <?= session('errors.judul') ? 'is-invalid' : '' ?>" value="<?= old('judul', $buku['judul']) ?>">
                <?php if (session('errors.judul')) : ?>
                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i> <?= session('errors.judul') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Penulis</label>
                <input type="text" name="penulis" class="form-control py-2 <?= session('errors.penulis') ? 'is-invalid' : '' ?>" value="<?= old('penulis', $buku['penulis']) ?>">
                <?php if (session('errors.penulis')) : ?>
                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i> <?= session('errors.penulis') ?></div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun" class="form-control py-2 <?= session('errors.tahun') ? 'is-invalid' : '' ?>" value="<?= old('tahun', $buku['tahun']) ?>">
                    <?php if (session('errors.tahun')) : ?>
                        <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i> <?= session('errors.tahun') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Jumlah Stok</label>
                    <input type="number" name="stok" class="form-control py-2 <?= session('errors.stok') ? 'is-invalid' : '' ?>" value="<?= old('stok', $buku['stok']) ?>">
                    <?php if (session('errors.stok')) : ?>
                        <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i> <?= session('errors.stok') ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end mt-2">
                <a href="/buku" class="btn btn-cancel px-4 py-2">Batal</a>
                <button type="submit" class="btn btn-mint px-4 py-2"><i class="bi bi-arrow-clockwise me-1"></i>Update Data</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>