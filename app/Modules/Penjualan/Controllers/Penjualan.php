<?php

namespace App\Modules\Penjualan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Produk\Models\BulkCarrierModel;
use App\Modules\Produk\Models\PassengerShipModel;
use App\Modules\Produk\Models\TugboatModel;

class Penjualan extends BaseController
{
    /**
     * Halaman utama penjualan
     */
    public function index($kategori = null)
    {
        $data = [
            'title'     => 'Penjualan Kapal',
            'kategori'  => $kategori,
            'user_id'   => session()->get('id'),
            'nama'      => session()->get('nama'),
            'email'     => session()->get('email'),
            'role'      => session()->get('role')
        ];

        return view(
            'App\Modules\Penjualan\Views\v_index_penjualan',
            $data
        );
    }

    /**
     * Simpan data penjualan kapal
     */
   public function simpan()
    {
    $kategori = $this->request->getPost('kategori');

     
    $data = [
        'user_id'               => session()->get('id'),
        'ship_name'             => $this->request->getPost('ship_name'),
        'ship_type'             => $this->request->getPost('ship_type'),
        'class'                 => $this->request->getPost('class'),
        'built_place'           => $this->request->getPost('built_place'),
        'navigation_area'       => $this->request->getPost('navigation_area'),
        'flag'                  => $this->request->getPost('flag'),
        'built_date'            => $this->request->getPost('built_date'),

        'loa'                   => $this->request->getPost('loa'),
        'breadth'               => $this->request->getPost('breadth'),
        'depth'                 => $this->request->getPost('depth'),
        'draft'                 => $this->request->getPost('draft'),

        'gt'                    => $this->request->getPost('gt'),
        'nt'                    => $this->request->getPost('nt'),

        'me_brand'              => $this->request->getPost('me_brand'),
        'main_engine_model'     => $this->request->getPost('main_engine_model'),
        'me_power'              => $this->request->getPost('me_power'),
        'rpm'                   => $this->request->getPost('rpm'),
        'speed'                 => $this->request->getPost('speed'),

        'aux_engine_brand'      => $this->request->getPost('aux_engine_brand'),
        'aux_engine_no'         => $this->request->getPost('aux_engine_no'),
        'aux_engine_power'      => $this->request->getPost('aux_engine_power'),

        'oil_consumption'       => $this->request->getPost('oil_consumption'),
        'main_engine_no'        => $this->request->getPost('main_engine_no'),

        'nox_emission_standard' => $this->request->getPost('nox_emission_standard'),
        'release_date'          => $this->request->getPost('release_date'),

        'price'                 => $this->request->getPost('price'),
    ];

    if ($kategori == 'bulk-carrier') {

        $data['dwt'] = $this->request->getPost('dwt');
        $data['capacity'] = $this->request->getPost('capacity');
        $data['cargo_hold_no'] = $this->request->getPost('cargo_hold_no');
        $data['hatch_length'] = $this->request->getPost('hatch_length');
        $data['hatch_width'] = $this->request->getPost('hatch_width');
        $data['derrick_crane'] = $this->request->getPost('derrick_crane');
        $data['hull_construction_type'] = $this->request->getPost('hull_construction_type');
        $data['hatch_cover_type'] = $this->request->getPost('hatch_cover_type');

        $model = new BulkCarrierModel();
    }

    elseif ($kategori == 'passenger-ship') {

        $data['passengers'] = $this->request->getPost('passengers');

        $model = new PassengerShipModel();
    }

    elseif ($kategori == 'tugboat') {

        $data['bollard_pull'] = $this->request->getPost('bollard_pull');
        $data['rudder_propeller_brand'] = $this->request->getPost('rudder_propeller_brand');
        $data['fire_fighting'] = $this->request->getPost('fire_fighting');
        $data['propulsion_type'] = $this->request->getPost('propulsion_type');

        $model = new TugboatModel();

      
    }
    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

     
    if ($kategori == 'passenger-ship') {
        $folder = ROOTPATH . 'public/assets/images/passenger/';
    }
    elseif ($kategori == 'bulk-carrier') {
        $folder = ROOTPATH . 'public/assets/images/bulk_carrier/';
    }
    elseif ($kategori == 'tugboat') {
        $folder = ROOTPATH . 'public/assets/images/tugboat/';
    }

    $newName = $image->getRandomName();

    $image->move($folder, $newName);

    $data['image'] = $newName;
    }

    $model->insert($data);

       return redirect()->to('profil')
    ->with('success', 'Kapal berhasil dipublikasikan.');
     

    }

}