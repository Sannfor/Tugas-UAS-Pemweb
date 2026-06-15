<?php

namespace App\Modules\Laporan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Produk\Models\BulkCarrierModel;
use App\Modules\Produk\Models\PassengerShipModel;
use App\Modules\Produk\Models\TugboatModel;






class Laporan extends BaseController
{
    protected $bulkModel;
    protected $passengerModel;
    protected $tugboatModel;

    public function __construct()
    {
        $this->bulkModel      = new BulkCarrierModel();
        $this->passengerModel = new PassengerShipModel();
        $this->tugboatModel   = new TugboatModel();
    }

    public function index()
        {
        $laporan = [];

         
        foreach ($this->bulkModel->findAll() as $item)
        {
            $item['kategori'] = 'Bulk Carrier';
            $laporan[] = $item;
        }

        foreach ($this->passengerModel->findAll() as $item)
        {
            $item['kategori'] = 'Passenger Ship';
            $laporan[] = $item;
        }

        foreach ($this->tugboatModel->findAll() as $item)
        {
            $item['kategori'] = 'Tugboat';
            $laporan[] = $item;
        }

        $data = [
            'title'   => 'Laporan Kapal',
            'laporan' => $laporan
        ];

        return view(
            'App\Modules\Laporan\Views\v_index_laporan',
            $data
        );
         

        }


   public function cetak()
        {
        $kategori = $this->request->getGet('kategori');
        $tahun    = $this->request->getGet('tahun');

         
        $builder = $this->kapalModel;

        if (!empty($kategori))
        {
            $builder->where('kategori', $kategori);
        }

        $laporan = $builder->findAll();

        if (!empty($tahun))
        {
            $laporan = array_filter($laporan, function ($item) use ($tahun) {

                if (!isset($item['created_at'])) {
                    return false;
                }

                return date('Y', strtotime($item['created_at'])) == $tahun;
            });
        }

        $data['laporan'] = $laporan;

        return view('App\Modules\Laporan\Views\cetak', $data);
         

        }


    
}