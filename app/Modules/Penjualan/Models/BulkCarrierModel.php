<?php

namespace App\Modules\Produk\Models;

use CodeIgniter\Model;

class BulkCarrierModel extends Model
{
    protected $table = 'bulk_carriers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'user_id',
        
        'ship_name',
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
        'dwt',
        'gt',
        'nt',
        'cargo_hold_no',
        'hatch_length',
        'hatch_width',
        'capacity',
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
        'derrick_crane',
        'hull_construction_type',
        'hatch_cover_type',
        'nox_emission_standard',
        'release_date',
        'status',
        'price',
        'image'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}