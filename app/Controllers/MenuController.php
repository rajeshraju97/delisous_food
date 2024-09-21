<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\UserModel;

class MenuController extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new Menu(); // Load the model
    }

    public function index(): string
    {
        $data['menus'] = $this->menuModel->findAll();
        // $userId = session()->get('user_id');
        // $userModel = new UserModel();
        // $user = $userModel->find($userId);

        // // Add username to the data array
        // $data['username'] = $user['username'];
        return view('menu', $data);
    }

    public function show($id)
    {
        $data['menu'] = $this->menuModel->find($id);
        return view('menu_siitem', $data);
    }
}
