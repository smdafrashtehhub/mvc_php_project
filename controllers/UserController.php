<?php

//namespace controllers;
//use Database;
use models\User;

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . "/../database/Database.php";

class  UserController
{
    private $db_connection;
    public $user;

    public function __construct()
    {
        $this->db_connection = Database::getInstance();
        $this->user = new User($this->db_connection);
    }

    public function index()
    {

        $users = $this->user->index()->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/users/create.php';
    }

    public function store()
    {
        if ($_POST) {
            $this->user->first_name = $_POST['first_name'];
            $this->user->last_name = $_POST['last_name'];
            $this->user->age = $_POST['age'];
        }
        $this->user->store();
        header("location:./index");
    }

    public function delete($id)
    {
        $this->user->delete($id);
        header("location:../index");
    }

    public function edit($id)
    {
        $user = $this->user->show($id)->fetch_assoc();
        require_once __DIR__ . '/../views/users/edit.php';

    }

    public function update()
    {
        session_start();
        $user = $this->user->show($_SESSION['user_id'])->fetch_assoc();
        $this->user->update();
        header("location:./index");

    }

    public function show($id)
    {
        $user = $this->user->show($id)->fetch_assoc();
        require_once __DIR__ . '/../views/users/show.php';

    }

    public function shoppingCart($id)
    {
        $user=$this->user->show($id)->fetch_assoc();
        $shopping_carts=$this->user->shoppingCart($id)->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/users/shopping_cart.php';

    }

    public function buyList($id)
    {
        $user=$this->user->show($id)->fetch_assoc();
        $buys=$this->user->buyList($id)->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/users/buy_list.php';

    }

    public function buy($product_id)
    {

        session_start();
        $user=$this->user->show($_SESSION['user_id'])->fetch_assoc();
        $this->user->buy($product_id,$user);
        header("Location: ../../shopping_cart/show/".$_SESSION['user_id']);

    }
}
