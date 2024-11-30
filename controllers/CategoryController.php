<?php

namespace controllers;
use Database;

class CategoryController
{
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = Database::getInstance();
    }

}