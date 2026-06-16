<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role',
        'npwp',
        'no_bank',
        'domisili_pelabuhan',
        'company_name',
        'profile_image',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function attemptLogin($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function isEmailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }
}