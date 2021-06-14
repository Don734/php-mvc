<?php

namespace App\Core;

use App\Lib\Database;

class Model
{
    public $db;

    public function __construct() {
        $this->db = new Database;
    }
}
