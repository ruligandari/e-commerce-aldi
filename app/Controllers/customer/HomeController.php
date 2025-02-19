<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    protected $produkModel;
    protected $promoModel;

    public function __construct()
    {
        $this->produkModel = new \App\Models\ProdukModel();
        $this->promoModel = new \App\Models\PromosiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'produk' => $this->produkModel->getProduk(),
            'promo' => $this->promoModel->findAll()
        ];
        return view('customer/home/home', $data);
    }

    public function getCategory()
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $kategori = $kategoriModel->findAll();
        return $this->response->setJSON($kategori);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact'

        ];
        return view('customer/contact/contact', $data);
    }

    public function profile()
    {
        // get table user
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('id'));
        $data = [
            'title' => 'Profile',
            'data' => $user

        ];
        return view('customer/profile/profile', $data);
    }

    public function update_profile()
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('id'));
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|matches[new_password]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('profile'))->withInput()->with('validation', $this->validator);
        }
        $password_baru = $this->request->getPost('new_password');
        $konfirmasi_password = $this->request->getPost('confirm_password');
        if ($password_baru != $konfirmasi_password) {
            return redirect()->to(base_url('profile'))->withInput()->with('error', 'Password tidak sama');
        }
        $data = [
            'full_name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'password' => password_hash($password_baru, PASSWORD_DEFAULT)
        ];
        $userModel->update($user['id'], $data);
        return redirect()->to(base_url('profile'))->with('success', 'Profile berhasil diupdate');
    }
}
