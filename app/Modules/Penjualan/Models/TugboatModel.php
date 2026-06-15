<?php

namespace App\Modules\Produk\Models;

use CodeIgniter\Model;

class TugboatModel extends Model
{
    protected $table = 'tugboats';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'ship_name',
        'price',
        'ship_type',
        'class',
        'built_place',
        'navigation_area',
        'flag',
        'built_date',
        'loa',
        'breadth',
        'depth',
        'draft',
        'gt',
        'nt',
        'bollard_pull',
        'rudder_propeller_brand',
        'me_brand',
        'main_engine_model',
        'me_power',
        'rpm',
        'speed',
        'aux_engine_brand',
        'aux_engine_no',
        'aux_engine_power',
        'oil_consumption',
        'main_engine_no',
        'fire_fighting',
        'propulsion_type',
        'nox_emission_standard',
        'release_date',
        'image'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}