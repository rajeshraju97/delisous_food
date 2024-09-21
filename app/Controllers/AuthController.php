<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function registerPost()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')

        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful.');
        } else {
            return redirect()->back()->with('errors', $userModel->errors());
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $ses_data = [
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'user_role' => $user['user_role'], // Include user_role in session data
                'logged_in' => TRUE
            ];
            session()->set($ses_data);

            // Redirect based on user role
            if ($user['user_role'] == 0) {
                return redirect()->to('/');
            } else {
                return redirect()->to('/admin/dashboard'); // Redirect to admin dashboard
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}