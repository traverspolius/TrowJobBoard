<?php

class Database{
    public $conn;

    /**
     * Constructor for the Database class
     * 
     * @param array $config
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->conn = new PDO($dsn, $config['username'],$config['password']); 

            echo 'connected :)';
        } catch (PDOExeption $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }
}