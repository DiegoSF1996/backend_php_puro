<?php 
namespace App\Models;
class Model {
    protected $conn;
    public function __construct()
    {
        $this->conn = new \PDO('sqlite:./desafio_php.db');
    }
}