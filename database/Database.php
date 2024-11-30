<?php

class Database
{
    private static $instance = null;  // Holds the single instance of the class
    private $connection;             // Database connection
    private $host = 'localhost';
    private $db_name = 'php';
    private $username = 'root';
    private $password = '';
    // Make the constructor private so no instance can be created directly
    private function __construct()
    {
        return $this->connection = new MySQLi($this->host, $this->username, $this->password,$this->db_name);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);}
    }

    // Public method to get the instance of the class (and database connection)
    public static function getInstance()
    {
        if (self::$instance === null) {
            // If no instance exists, create one
            self::$instance = new self();
        }
        return self::$instance->connection;  // Return the existing connection
    }

    // Prevent cloning the instance (singleton pattern)
    private function __clone() {}

    // Prevent unserializing the instance
    public function __wakeup() {}
}
?>




<?php
