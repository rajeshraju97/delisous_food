<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\OrderModel;
use App\Models\Menu;
use App\Models\TransactionModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthController extends BaseController
{
    public function index()
    {
        // View for admin registration
        return view('admin/register');
    }
    public function registerPost()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'user_role' => 1,
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
        return view('admin/login'); // View for admin login
    }



    public function dashboard()
    {
        $userModel = new UserModel();
        $orderModel = new OrderModel();
        $menuModel = new Menu();
        $transactionModel = new TransactionModel();

        $users = $userModel->select('username, email, user_role, created_at')->findAll();
        $orders = $orderModel->findAll(); // Fetch all orders
        $menus = $menuModel->findAll(); // Fetch all menu items
        $transactions = $transactionModel->findAll(); // Fetch all transactions

        return view('admin/dashboard', [
            'users' => $users,
            'orders' => $orders,
            'menus' => $menus,
            'transactions' => $transactions
        ]);
    }
    public function users()
    {
        $userModel = new UserModel();
        $users = $userModel->select('username, email, user_role, created_at')->findAll();

        return view('admin/user_list', [
            'users' => $users
        ]);
    }
    public function add()
    {
        // Load the Add Admin view
        return view('admin/add_admin');
    }

    public function add_process()
    {
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'phone' => 'required',
            'type' => 'required|integer',
            'salary' => 'required|numeric',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Return with validation errors
            return redirect()->back()->withInput()->with('wrong', $validation->listErrors());
        }

        // Handle form submission and save admin
        $adminModel = new AdminModel();

        // Prepare data
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'type' => $this->request->getPost('type'),
            'salary' => $this->request->getPost('salary'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads', $imageName);
            $data['image'] = $imageName;
        }

        if ($adminModel->save($data)) {
            return redirect()->to('admin/add')->with('success', 'Admin added successfully!');
        } else {
            return redirect()->back()->withInput()->with('wrong', 'Failed to add admin.');
        }
    }
    

    public function orders()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->findAll();

        return view('admin/orders', ['orders' => $orders]);
    }

    public function menu()
    {
        $menuModel = new Menu(); // Use the correct model name
        $menus = $menuModel->findAll(); // Fetch all menu items

        return view('admin/menu', [
            'menus' => $menus
        ]);
    }
    public function transactionReport()
    {
        $transactionModel = new TransactionModel();

        // Specify the fields you want to retrieve
        $transactionModel->select('transaction_id, user_id, name, payment_method, status, created_at');

        $data['transactions'] = $transactionModel->findAll();
        return view('admin/transaction_report', $data);
    }


    public function logout()
    {
        session()->remove('admin');
        return redirect()->to('/admin/login');
    }

}