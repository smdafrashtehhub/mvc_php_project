<?php

use models\User;

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . "/../database/Database.php";

class  BuyController
{
    private $db_connection;
    public $user;

    public function __construct()
    {
        $this->db_connection = Database::getInstance();
        $this->user = new User($this->db_connection);
    }
    public function buy($product_id)
    {
        session_start();
        $user=$this->user->show($_SESSION['user_id'])->fetch_assoc();
        $this->user->buy($product_id,$user);
        header("Location: ../shopping_cart/".$_SESSION['user_id']);

    }
}