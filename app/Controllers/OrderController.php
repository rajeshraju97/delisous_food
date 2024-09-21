<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\Cart;
use App\Models\TransactionModel;

class OrderController extends Controller
{


    public function processCheckout()
    {
        $request = \Config\Services::request();

        // Get form data
        $user_id = $request->getPost('user_id');
        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $address = $request->getPost('address');
        $payment = $request->getPost('payment');
        $total_price = $request->getPost('total_price');

        // Load the OrderModel and TransactionModel
        $orderModel = new OrderModel();
        $transactions = new TransactionModel();
        $cartModel = new Cart(); // Assuming CartModel is the model handling cart operations

        // Create transaction record
        // Generate a unique transaction ID
        $transactionId = uniqid('TRANS_', true);
        $transdata = [
            'transaction_id' => $transactionId,
            'user_id' => $user_id,
            'name' => $name,
            'payment_method' => $payment,
            'status' => 'complete',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $transactions->save($transdata);

        // Prepare order data
        $orderData = [
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'payment_method' => $payment,
            'total_price' => $total_price, // Store cart as JSON
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save order to the database
        if ($orderModel->save($orderData)) {
            // Retrieve and delete items from the cart based on the user's email
            $cartModel->where('user_id', $user_id)->delete();

            // Redirect to a confirmation page or display a success message
            return view('checkout_success');
        } else {
            // Handle errors or redirect to an error page
            return redirect()->back()->with('error', 'There was a problem processing your order.');
        }
    }


}