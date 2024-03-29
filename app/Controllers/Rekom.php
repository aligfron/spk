<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelviewkriteria;

class Rekom extends BaseController
{
    protected $modelkriteria;
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function alam()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $this->modelkriteria = new Modelviewkriteria();
        $kriteria = $this->modelkriteria->findAll();
        $data = [
            'title1' => 'Alam',
            'kriteria' => $kriteria
        ];
        return view('wisatawan/1rekomalam', $data);
    }
    public function sejarah()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $this->modelkriteria = new Modelviewkriteria();
        $kriteria = $this->modelkriteria->findAll();
        $data = [
            'title1' => 'Sejarah',
            'kriteria' => $kriteria
        ];
        return view('wisatawan/2rekomsejarah', $data);
    }
    public function buatan()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $this->modelkriteria = new Modelviewkriteria();
        $kriteria = $this->modelkriteria->findAll();
        $data = [
            'title1' => 'Buatan',
            'kriteria' => $kriteria
        ];
        return view('wisatawan/rekombuatan', $data);
    }
    public function kuliner()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $this->modelkriteria = new Modelviewkriteria();
        $kriteria = $this->modelkriteria->findAll();
        $data = [
            'title1' => 'Kuliner',
            'kriteria' => $kriteria
        ];
        return view('wisatawan/4rekomkuliner', $data);
    }
}
