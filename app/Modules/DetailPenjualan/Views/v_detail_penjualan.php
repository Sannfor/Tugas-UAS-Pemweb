<!DOCTYPE html>
<html>

<head>
    <title>Detail Penjualan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h3>Detail Penjualan</h3>

    <table class="table table-bordered">

        <thead>

        <tr>

            <th>ID</th>
            <th>Pembeli</th>
            <th>Penjual</th>
            <th>Kapal</th>
            <th>Status</th>

        </tr>

        </thead>

        <tbody>

        <?php foreach($transaksi as $t): ?>

        <tr>

            <td><?= $t['id'] ?></td>
            <td><?= $t['buyer_id'] ?></td>
            <td><?= $t['seller_id'] ?></td>
            <td><?= $t['ship_id'] ?></td>
            <td><?= $t['status'] ?></td>

        </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

</body>

</html>