<!DOCTYPE html>
<html>
<head>
    <title><?= esc($berita['judul']) ?></title>
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <a href="<?= base_url('berita') ?>" class="btn btn-secondary mb-4">
        ← Kembali
    </a>

    <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>"
     class="img-fluid rounded shadow mb-4"
     alt="<?= esc($berita['judul']) ?>">

    <h1><?= esc($berita['judul']) ?></h1>

    <p class="text-muted">
        <?= date('d F Y', strtotime($berita['created_at'])) ?>
    </p>

    <hr>

    <div>
        <?= $berita['isi'] ?>
    </div>

</div>

</body>
</html>