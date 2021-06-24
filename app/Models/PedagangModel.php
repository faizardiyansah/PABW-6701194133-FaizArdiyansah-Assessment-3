<?php

namespace App\Models;

use CodeIgniter\Model;

class PedagangModel extends Model
{
    protected $table = 'pedagang';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'telepon', 'alamat'];

    public function getPedagang($nama = false)
    {
        if ($nama == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $nama])->first();
    }
}
