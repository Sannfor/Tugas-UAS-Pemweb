<!DOCTYPE html>
<html>
<head>
    <title>Jual Kapal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">
                🚢 Jual Kapal -
                <?= ucwords(str_replace('-', ' ', $kategori)) ?>
            </h3>
        </div>

        <div class="card-body">

            <form action="<?= base_url('katalog/simpan') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <input type="hidden"
                       name="kategori"
                       value="<?= $kategori ?>">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kapal</label>
                        <input type="text"
                               name="ship_name"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">IMO Number</label>
                        <input type="text"
                               name="imo_no"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Dibangun</label>
                        <input type="number"
                               name="built_year"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flag</label>
                        <input type="text"
                               name="flag"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Length Overall (LOA)</label>
                        <input type="text"
                               name="loa"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deadweight (DWT)</label>
                        <input type="number"
                               name="dwt"
                               class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Harga Jual (USD)</label>
                        <input type="number"
                               name="price"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Deskripsi Kapal</label>
                        <textarea name="description"
                                  rows="5"
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">Foto Kapal</label>
                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">
                    </div>

                </div>

                <div class="text-center">

                    <button type="submit"
                            class="btn btn-success btn-lg px-5">
                        🚢 Publish Listing
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>