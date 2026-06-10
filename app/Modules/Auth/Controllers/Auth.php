<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Auth extends BaseController
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
        helper(['form', 'url', 'session']);
    }

    // Tampilkan Halaman Login
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to($this->redirectByRole());
        }

        $data['title'] = 'Login - Marketplace Kapal';
        return view('App\Modules\Auth\Views\login', $data);
    }

    // Proses Login
    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->authModel->attemptLogin($email, $password);

        if ($user) {
            $this->setUserSession($user);
            return redirect()->to($this->redirectByRole());
        }

        return redirect()->back()->withInput()->with('error', 'Email atau Password salah!');
    }

    // Set Session User
    private function setUserSession($user)
    {
        $data = [
            'id'           => $user['id'],
            'nama'         => $user['nama'],
            'email'        => $user['email'],
            'role'         => $user['role'],
            'isLoggedIn'   => true
        ];

        session()->set($data);
    }

    // Redirect berdasarkan Role
    private function redirectByRole()
    {
        $role = session()->get('role');
        
        if ($role === 'admin') {
            return '/admin/dashboard';
        } elseif ($role === 'mitra') {
            return '/mitra/dashboard';
        } else {
            return '/user/dashboard';
        }
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

        // Tampilkan Halaman Register
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to($this->redirectByRole());
        }

        $data['title'] = 'Register - Marketplace Kapal';
        return view('App\Modules\Auth\Views\register', $data);
    }

    // Proses Register
    public function attemptRegister()
    {
        $rules = [
            'nama'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[user,mitra]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->authModel->insert($data)) {
            return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal mendaftar. Coba lagi.');
    }
}