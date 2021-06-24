<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PedagangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Rahman',
                'alamat'    => 'Bandung',
                'Telepon'    => '0812345678'
            ],
            [
                'nama' => 'Agus',
                'alamat'    => 'Bandung',
                'Telepon'    => '089876543'
            ]
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO orang (nama, alamat) VALUES(:nama:, :alamat:)", $data);

        // Using Query Builder
        $this->db->table('pedagang')->insertBatch($data);
    }
}
