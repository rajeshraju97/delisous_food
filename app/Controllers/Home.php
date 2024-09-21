<?php

namespace App\Controllers;

use App\Models\Menu;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data = $this->getCommonData(); // Get common data (menus, username)

        return view('home', $data);
    }

    public function about(): string
    {
        $data = $this->getCommonData(); // Get common data (menus, username)
        return view('about', $data);
    }

    public function contact(): string
    {
        $data = $this->getCommonData(); // Get common data (menus, username)
        return view('contact', $data);
    }

    private function getCommonData(): array
    {
        $menu = new Menu();
        $data['menus'] = $menu->findAll(); // Load menu data

        $data['username'] = null; // Default to null

        $userId = session()->get('user_id');

        if ($userId) {
            $userModel = new UserModel();
            $user = $userModel->find($userId);

            if ($user && isset($user['username'])) {
                $data['username'] = $user['username'];
            }
        }

        return $data;
    }


}

