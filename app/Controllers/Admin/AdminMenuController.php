<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Menu;
use CodeIgniter\HTTP\ResponseInterface;

class AdminMenuController extends BaseController
{
    public function index()
    {
        $menuModel = new Menu();
        $menus = $menuModel->findAll();

        return view('admin/menu_list', ['menus' => $menus]);
    }

    public function add()
    {
        return view('admin/menu_add');
    }

    public function store()
    {
        $menuModel = new Menu();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        // Handle image upload
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/images', $imageName); // Store image in public/uploads/images
            $data['image'] = $imageName;
        }

        $menuModel->save($data);

        return redirect()->to('/admin/menu');
    }

    // Edit a menu item
    public function edit($id)
    {
        $menuModel = new Menu();
        $menu = $menuModel->find($id);

        if (!$menu) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Menu item with ID $id not found.");
        }

        return view('admin/menu_edit', ['menu' => $menu]);
    }

    public function update($id)
    {
        $menuModel = new Menu();
        $menu = $menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/admin/menu')->with('status', 'Menu item not found');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        // Handle image upload
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Remove old image if exists
            if (!empty($menu['image']) && file_exists(ROOTPATH . 'public/uploads/images/' . $menu['image'])) {
                unlink(ROOTPATH . 'public/uploads/images/' . $menu['image']);
            }

            $imageName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/images', $imageName); // Store image in public/uploads/images
            $data['image'] = $imageName;
        }

        $menuModel->update($id, $data);

        return redirect()->to('/admin/menu')->with('status', 'Menu item updated successfully');
    }



    // Delete a menu item
    public function delete($id)
    {
        $menuModel = new Menu();
        $menu = $menuModel->find($id);

        if ($menu) {
            // Delete the image file if it exists
            if (!empty($menu['image']) && file_exists(ROOTPATH . 'public/uploads/images/' . $menu['image'])) {
                unlink(ROOTPATH . 'public/uploads/images/' . $menu['image']);
            }

            $menuModel->delete($id);

            return redirect()->to('/admin/menu')->with('status', 'Menu item deleted successfully');
        }

        return redirect()->to('/admin/menu')->with('status', 'Menu item not found');
    }
}
