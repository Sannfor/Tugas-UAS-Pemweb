<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>
        body{
            font-family: Arial, sans-serif;
        }

        h2{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
        }

        table th{
            background:#eee;
        }
    </style>
</head>
<body>

<h2>Laporan Transaksi Kapal</h2>

<table>

    <thead>
        <tr>
            <th>No</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Kapal</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>

    <?php $no=1; ?>

    <?php foreach($laporan as $row): ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= esc($row['buyer_name']) ?></td>

            <td><?= esc($row['seller_name']) ?></td>

            <td><?= esc($row['ship_name']) ?></td>

            <td>
                $
                <?= number_format($row['transaction_price'],0,',','.') ?>
            </td>

            <td><?= esc($row['status']) ?></td>

            <td><?= date('Y-m-d',strtotime($row['created_at'])) ?></td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</body>
</html>