<?php
/**
 * Database
 */

class Database
{

    protected $db;

    public function __construct()
    {
        $config = include 'config/database.php';
        $this->db = new mysqli($config['hostname'], $config['username'], $config['password'], $config['database']);
    }
}
