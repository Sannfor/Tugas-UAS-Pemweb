<?php

namespace App\Modules\Produk\Controllers;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    // Halaman kategori
    public function kategori()
    {
        $data['title'] = 'Purchase Ships';

        return view('App\Modules\Produk\Views\kategori', $data);
    }

    // Bulk Carrier
    public function bulkCarrier()
    {
        $data['title'] = 'Bulk Carrier';

        return view('App\Modules\Produk\Views\bulk_carrier', $data);
    }

    // Passenger Ship
    public function passengerShip()
    {
        $data['title'] = 'Passenger Ship';

        return view('App\Modules\Produk\Views\passenger_ship', $data);
    }

    // Tug Boat
    public function tugBoat()
    {
        $data['title'] = 'Tug Boat';

        return view('App\Modules\Produk\Views\tug_boat', $data);
    }
}