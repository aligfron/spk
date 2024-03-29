<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Register extends BaseController
{
    protected $model;
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        return view('pages/daftar', $data);
    }


    public function save()
    {

        //validasi input dan form tidak boleh sama

        $email = $this->request->getPost('email');
        $pass = $this->request->getVar('password');
        $validation = \Config\Services::validation();

        $rules = [
            'email' => ['rules' => 'is_unique[tb_login.email]', 'errors' => [
                'is_unique' => 'email sudah ada'
            ]]
        ];

        if (!$this->validate($rules)) {
            $sessError = [
                'errEmail' => $validation->getError('email'),
                'errPassword' => $validation->getError('password'),
            ];
            session()->setFlashdata($sessError);

            return redirect()->to(site_url('register/index'));
        } else {
            $this->model = new ModelLogin();
            $this->model->save(
                [
                    'nama_user'     => $this->request->getVar('nama'),
                    'email'    => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'userlevelid'       => '2'
                ]
            );
            session()->setFlashdata('pesan', 'Berhasil daftar, silahkan login');
            return redirect()->to('/login');
        }
    }
}
