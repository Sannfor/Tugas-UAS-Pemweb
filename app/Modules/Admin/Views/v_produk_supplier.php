<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Supplier</title>

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body{
        background:#f4f7fc;
        font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
    }


    .main-content{
        max-width:1400px;
        margin:auto;
        padding:30px;
    }

    .content-card{
        background:white;
        border-radius:15px;
        padding:25px;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
    }
</style>
 

</head>
<body>



<div class="main-content">
<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>
        Produk Supplier
    </h3>

    <a href="javascript:history.back()"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="content-card">

    <ul class="nav nav-tabs mb-4">

        <li class="nav-item">
            <button class="nav-link active"
                    data-bs-toggle="tab"
                    data-bs-target="#bulk">

                Bulk Carrier

            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link"
                    data-bs-toggle="tab"
                    data-bs-target="#tugboat">

                Tugboat

            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link"
                    data-bs-toggle="tab"
                    data-bs-target="#passenger">

                Passenger Ship

            </button>
        </li>

    </ul>

    <div class="tab-content">

        <!-- BULK -->

        <div class="tab-pane fade show active" id="bulk">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nama Kapal</th>
                       
                        <th>Harga</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(!empty($bulk)): ?>

                    <?php foreach($bulk as $b): ?>

                    <tr>

                        <td><?= $b['id'] ?></td>

                        <td><?= esc($b['ship_name'] ?? '-') ?></td>

                        

                        <td>
                            <?= esc($b['price'] ?? '-') ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4" class="text-center">

                            Tidak ada data

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <!-- TUGBOAT -->

        <div class="tab-pane fade" id="tugboat">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nama Kapal</th>
                       
                        <th>Harga</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(!empty($tugboat)): ?>

                    <?php foreach($tugboat as $t): ?>

                    <tr>

                        <td><?= $t['id'] ?></td>

                        <td><?= esc($t['ship_name'] ?? '-') ?></td>

                        

                        <td><?= esc($t['price'] ?? '-') ?></td>

                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4" class="text-center">

                            Tidak ada data

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <!-- PASSENGER -->

        <div class="tab-pane fade" id="passenger">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nama Kapal</th>
                        
                        <th>Harga</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(!empty($passenger)): ?>

                    <?php foreach($passenger as $p): ?>

                    <tr>

                        <td><?= $p['id'] ?></td>

                        <td><?= esc($p['ship_name'] ?? '-') ?></td>

                
                        <td><?= esc($p['price'] ?? '-') ?></td>

                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4" class="text-center">

                            Tidak ada data

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
 

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
