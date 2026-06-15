<?php
/**
 * @var string $kategori
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jual Kapal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">
                🚢 Jual Kapal - <?= ucwords(str_replace('-', ' ', esc($kategori))) ?>
            </h3>
        </div>

        <div class="card-body">
            <form action="<?= base_url('produk/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="kategori" value="<?= esc($kategori) ?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Kapal</label>
                        <input type="text" name="ship_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tipe Kapal</label>
                        <input type="text" name="ship_type" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Class</label>
                        <input type="text" name="class" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Bendera (Flag)</label>
                        <input type="text" name="flag" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tempat Dibangun</label>
                        <input type="text" name="built_place" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tanggal Dibangun</label>
                        <input type="date" name="built_date" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Navigation Area</label>
                        <input type="text" name="navigation_area" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>LOA (m)</label>
                        <input type="number" step="0.01" name="loa" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Breadth (m)</label>
                        <input type="number" step="0.01" name="breadth" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Depth (m)</label>
                        <input type="number" step="0.01" name="depth" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Draft (m)</label>
                        <input type="number" step="0.01" name="draft" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>GT</label>
                        <input type="number" step="0.01" name="gt" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>NT</label>
                        <input type="number" step="0.01" name="nt" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Merk Mesin Utama</label>
                        <input type="text" name="me_brand" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Model Mesin Utama</label>
                        <input type="text" name="main_engine_model" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Daya Mesin Utama (kW)</label>
                        <input type="number" name="me_power" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>RPM</label>
                        <input type="number" name="rpm" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Kecepatan (Knots)</label>
                        <input type="number" step="0.01" name="speed" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Merk Mesin Bantu</label>
                        <input type="text" name="aux_engine_brand" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Jumlah Mesin Bantu</label>
                        <input type="number" name="aux_engine_no" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Daya Mesin Bantu</label>
                        <input type="number" step="0.01" name="aux_engine_power" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Konsumsi BBM (Ton/Hari)</label>
                        <input type="number" step="0.01" name="oil_consumption" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Jumlah Main Engine</label>
                        <select name="main_engine_no" class="form-control">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>NOX Emission Standard</label>
                        <input type="text" name="nox_emission_standard" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tanggal Available</label>
                        <input type="date" name="release_date" class="form-control">
                    </div>

                    <?php if($kategori == 'bulk-carrier'): ?>
                    <div class="col-12"><hr><h4 class="mt-4 mb-3">Bulk Carrier Specification</h4></div>
                    
                    <div class="col-md-6 mb-3">
                        <label>DWT</label>
                        <input type="number" name="dwt" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Capacity (m³)</label>
                        <input type="number" step="0.01" name="capacity" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Cargo Hold Number</label>
                        <input type="number" name="cargo_hold_no" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hatch Length</label>
                        <input type="number" step="0.01" name="hatch_length" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hatch Width</label>
                        <input type="number" step="0.01" name="hatch_width" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Derrick Crane</label>
                        <select name="derrick_crane" class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hull Construction Type</label>
                        <input type="text" name="hull_construction_type" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hatch Cover Type</label>
                        <input type="text" name="hatch_cover_type" class="form-control">
                    </div>
                    <?php endif; ?>

                    <?php if($kategori == 'passenger-ship'): ?>
                    <div class="col-12"><hr><h4 class="mt-4 mb-3">Passenger Ship Specification</h4></div>

                    <div class="col-md-6 mb-3">
                        <label>Passenger Capacity</label>
                        <input type="number" name="passengers" class="form-control">
                    </div>
                    <?php endif; ?>

                    <?php if($kategori == 'tugboat'): ?>
                    <div class="col-12"><hr><h4 class="mt-4 mb-3">Tugboat Specification</h4></div>

                    <div class="col-md-6 mb-3">
                        <label>Bollard Pull (Ton)</label>
                        <input type="number" step="0.01" name="bollard_pull" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Rudder Propeller Brand</label>
                        <input type="text" name="rudder_propeller_brand" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Fire Fighting</label>
                        <input type="text" name="fire_fighting" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Propulsion Type</label>
                        <input type="text" name="propulsion_type" class="form-control">
                    </div>
                    <?php endif; ?>

                    <div class="col-md-12 mb-3 mt-4">
                        <label>Harga Jual (USD)</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Deskripsi Kapal</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label>Foto Kapal</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= base_url('profil') ?>" class="btn btn-secondary btn-lg px-5 me-2">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-lg px-5">
                        Jual Kapal Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>