<?php

namespace models;
class Category
{
    private $connection;
    private $table = 'categories';
    public $name;

    public function __construct($db_connection)
    {
        $this->connection = $db_connection;
    }

    public function index()
    {
        $query = "SELECT * FROM " . $this->table;
        return $this->connection->query($query);
    }

}