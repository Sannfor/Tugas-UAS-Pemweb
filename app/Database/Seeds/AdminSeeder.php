<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama'     => 'Administrator',
            'email'    => 'admin@marketplacekapal.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role'     => 'admin',
            'nik'      => '1234567890123456',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Cek apakah admin sudah ada
        $existing = $this->db->table('users')->where('email', 'admin@marketplacekapal.com')->get()->getRow();

        if (!$existing) {
            $this->db->table('users')->insert($data);
            echo "✅ Akun Admin berhasil dibuat!\n";
            echo "Email: admin@marketplacekapal.com\n";
            echo "Password: admin123\n";
        }
    }
}