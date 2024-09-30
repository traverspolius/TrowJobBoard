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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try{
            $this->conn = new PDO($dsn, $config['username'],$config['password'], $options); 

            echo 'connected :)';
        } catch (PDOExeption $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * 
     * @param string $sql
     * 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($sql){
        try{
            $sth = $this->conn->prepare($sql);
            $sth->execute();
            return $sth;
        } catch (PDOException $e){
            throw new Exception("SQL Query failed to execute: {$e->getMessage()}");
        }
    }
}