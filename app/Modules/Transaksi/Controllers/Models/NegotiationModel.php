<?php

namespace App\Models;

use CodeIgniter\Model;

class NegotiationModel extends Model
{
    protected $table = 'negotiations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
}