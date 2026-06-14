<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet">
    <title>Kategori</title>
</head>
<body>
    <div class="container py-5">

    <h2 class="text-center fw-bold mb-5">
        🚢 Pilih Kategori Kapal
    </h2>

    <div class="row g-4 justify-content-center">

        <div class="col-md-4">
            <a href="<?= base_url('profil/jual-kapal/bulk-carrier') ?>"
               class="category-card text-decoration-none">

                <div class="card-body-custom">
                    <div class="icon">🚢</div>
                    <h4>Bulk Carrier</h4>
                    <p>Kapal pengangkut kargo curah</p>
                </div>

            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('profil/jual-kapal/tugboat') ?>"
               class="category-card text-decoration-none">

                <div class="card-body-custom">
                    <div class="icon">🚤</div>
                    <h4>Tug Boat</h4>
                    <p>Kapal penarik dan pemandu</p>
                </div>

            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('profil/jual-kapal/passenger-ship') ?>"
               class="category-card text-decoration-none">

                <div class="card-body-custom">
                    <div class="icon">🛳️</div>
                    <h4>Passenger Ship</h4>
                    <p>Kapal penumpang dan wisata</p>
                </div>

            </a>
        </div>

    </div>

</div>
</body>
</html>