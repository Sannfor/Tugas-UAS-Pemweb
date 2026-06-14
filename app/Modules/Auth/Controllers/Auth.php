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

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to($this->redirectByRole());
        }

        $data['title'] = 'Login - DryDock';

        return view('App\Modules\Auth\Views\login', $data);
    }

    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->authModel->attemptLogin($email, $password);

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau Password salah!');
        }

        $this->setUserSession($user);

        return redirect()->to($this->redirectByRole());
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to($this->redirectByRole());
        }

        $data['title'] = 'Register - DryDock';

        return view('App\Modules\Auth\Views\register', $data);
    }

    public function attemptRegister()
    {
        $rules = [
            'nama'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]|max_length[255]'
        ];

        $messages = [
            'password' => [
                'min_length' => 'Password harus minimal 8 karakter'
            ],
            'email' => [
                'is_unique' => 'Email sudah terdaftar'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama'       => $this->request->getPost('nama'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'       => 'user',
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->authModel->insert($data)) {
            return redirect()->to('/auth/login')
                ->with('success', 'Registrasi berhasil! Silakan login.');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal melakukan registrasi.');
    }

    /*
    |--------------------------------------------------------------------------
    | FORGOT PASSWORD
    |--------------------------------------------------------------------------
    */

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password - DryDock';

        return view(
            'App\Modules\Auth\Views\forgot_password',
            $data
        );
    }

    public function updateForgotPassword()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('password_confirm');

        if ($password !== $confirmPassword) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Konfirmasi password tidak sama.');
        }

        $user = $this->authModel
            ->where('email', $email)
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email tidak ditemukan.');
        }

        $this->authModel->update($user['id'], [
            'password' => password_hash(
                $password,
                PASSWORD_DEFAULT
            )
        ]);

        return redirect()->to('/auth/login')
            ->with('success', 'Password berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/auth/login');
    }

    /*
    |--------------------------------------------------------------------------
    | SESSION
    |--------------------------------------------------------------------------
    */

    private function setUserSession($user)
    {
        session()->set([
            'id'         => $user['id'],
            'nama'       => $user['nama'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'isLoggedIn' => true
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | REDIRECT ROLE
    |--------------------------------------------------------------------------
    */

    private function redirectByRole()
    {
    if (session()->get('role') === 'admin') {
    return '/admin/dashboard';
    }

    return '/';

    }

}