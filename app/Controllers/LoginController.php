<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('username')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Login | Book Shop',
        ];

        return view('pages/login', $data);
    }
    public function login_action()
    {
        $model = model(LoginModel::class);
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $model->getDataUsers($username, $password);

        if ($cek == 1) {
            session()->set('username', $username);
            // Load the necessary libraries

            $username = '/' . $username;
            return redirect()->to("/");
        } else {
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
