<?php

namespace App\Controllers;

use App\Models\PedagangModel;

class Pedagang  extends BaseController
{
    protected $PedagangModel;
    public function __construct()
    {
        $this->pedagangModel = new PedagangModel();
        helper('form');
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar Pedagang - Aptrabemo',
            'pedagang' => $this->pedagangModel->getPedagang()
        ];

        return view('pedagang/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Pedagang - Aptrabemo',
            'validation' => \Config\Services::validation()
        ];
        return view('pedagang/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[pedagang.nama]',
                'errors' => [
                    'required' => '{field} nama harus diisi',
                    'is_unique' => '{field} nama sudah terdaftar'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} alamat harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} telepon harus diisi'
                ]
            ]

        ])) {
            //$validation = \Config\Services::validation();
            //return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pedagang/create')->withInput();
        }


        $this->pedagangModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pedagang');
    }
    public function delete_data($id)
    {
        $this->pedagangModel->delete($id);
        return redirect()->to('/pedagang');
    }

    public function update_data($id)
    {
        $inserted = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        ];

        $this->pedagangModel->update($id, $inserted);
        return redirect()->to('/pedagang');
    }
}
