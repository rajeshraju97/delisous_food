<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\OrderModel;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'User not found. Please log in again.');
        }

        $orderModel = new OrderModel();
        $orders = $orderModel->where('user_id', $userId)->findAll();

        return view('dashboard', [
            'username' => $user['username'],
            'orders' => $orders,
            'profile' => $user
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
