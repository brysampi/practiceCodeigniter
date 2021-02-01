<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_test extends Model{
    protected $table = 'first';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}

?>