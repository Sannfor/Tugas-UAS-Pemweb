<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">Profil Saya</h2>

    <div class="card shadow">

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text"
                       class="form-control"
                       value="<?= esc($user['nama']) ?>"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="text"
                       class="form-control"
                       value="<?= esc($user['email']) ?>"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Role</label>
                <input type="text"
                       class="form-control"
                       value="<?= esc($user['role']) ?>"
                       readonly>
            </div>

            <?php if (!empty($user['nik'])) : ?>
            <div class="mb-3">
                <label class="form-label fw-bold">NIK</label>
                <input type="text"
                       class="form-control"
                       value="<?= esc($user['nik']) ?>"
                       readonly>
            </div>
            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>