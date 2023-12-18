<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $datauser = [
            'username' => 'user',
            'password'    => 'user',
        ];

        // Using Query Builder
        $this->db->table('users')->insert($datauser);
    }
}
