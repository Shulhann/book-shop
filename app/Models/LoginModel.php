<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function getDataUsers($username, $password)
    {
        $db = \Config\Database::connect();

        $query = $db->table('users')
            ->select('username')
            ->where('username', $username)
            ->where('password', $password)
            ->get();

        $results = $query->getResult();
        return count($results);
    }
}
