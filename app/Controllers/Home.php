<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        return view('pages/index');
    }
    public function rekom()
    {
        return view('pages/rekom');
    }
    public function tentang()
    {
        return view('pages/tentang');
    }
    public function daftar()
    {
        $data = [
            'title' => 'Daftar'
        ];
        return view('pages/daftar', $data);
    }
    public function ketentuan()
    {


        return view('pages/ketentuan');
    }
}
