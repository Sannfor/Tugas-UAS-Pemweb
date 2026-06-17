<?php

namespace App\Modules\Produk\Models;

use CodeIgniter\Model;

class PassengerShipModel extends Model
{
    protected $table            = 'passenger_ships';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

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
        'gt',
        'nt',
        'passengers',
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
        'nox_emission_standard',
        'release_date',
        'status',
        'price',
        'user_id',
        'image'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}