<?php

namespace App\Modules\Laporan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Laporan\Models\TransactionModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
protected $transactionModel;

 
public function __construct()
{
    $this->transactionModel = new TransactionModel();
}

public function index()
{
    $data['laporan'] = $this->transactionModel->getLaporan();

    return view(
        'App\Modules\Laporan\Views\v_index_laporan',
        $data
    );
}
 





   public function cetak()
    {
        $data['laporan'] = $this->transactionModel->getLaporan();

        $html = view(
            'App\Modules\Laporan\Views\cetak',
            $data
        );

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream(
            'laporan-transaksi.pdf',
            ['Attachment' => true]
        );
    }



    
}