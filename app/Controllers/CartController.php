<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Cart;
use CodeIgniter\RESTful\ResourceController;

class CartController extends ResourceController
{
    protected $format = 'json';

    public function cart()
    {
        // Get the cart data from the request
        $cartData = $this->request->getJSON(true);

        // Load the database
        $db = \Config\Database::connect();

        // Iterate over cart items and insert them into the cart table
        $userId = session()->get('user_id');
        foreach ($cartData as $item) {
            $data = [
                'user_id' => $userId,
                'item_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
            $db->table('cart')->insert($data);
        }

        // Respond with a success message
        return $this->respond(['status' => 'success']);
    }
    public function checkout(): string
{
    $userId = session()->get('user_id');

    $userModel = new UserModel();
    $user = $userModel->find($userId);

    $cartModel = new Cart();
    $carts = $cartModel->where('user_id', $userId)->findAll();

    // Calculate total price
    $totalPrice = 0;
    foreach ($carts as $cart) {
        $totalPrice += $cart['price'] * $cart['quantity'];
    }

    // Add user and cart details to the data array
    $data['user'] = $user;
    $data['carts'] = $carts;
    $data['totalPrice'] = $totalPrice;

    return view('checkout', $data);
}
}