<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'name', 'customer', 'quantity', 'total_price'];

    // Add any other necessary configurations or methods here
}
