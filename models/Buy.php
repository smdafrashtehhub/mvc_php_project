<?php

namespace models;
class Buy
{
    private $table = 'product_user_buy';
    private $connection;
    public $user_id, $product_id, $count;

    public function __construct($db_connection)
    {
        $this->connection = $db_connection;
    }
}