<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth extends Model
{
    function getDataAuthentication($username, $pass)
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT usernmae FROM users WHERE 
        username = "' . $username . '" 
        AND password = "' . $pass . '"';
        $query   = $db->query($queryString);
        $results = $query->getResult();
        return count($results);
    }
}