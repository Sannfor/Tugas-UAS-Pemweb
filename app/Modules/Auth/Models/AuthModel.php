<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'email', 'password', 'role', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Cek login
    public function attemptLogin($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Cek apakah email sudah terdaftar
    public function isEmailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }
}