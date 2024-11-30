<?php

require_once __DIR__ . '/../models/ShoppingCart.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . "/../database/Database.php";

use models\ShoppingCart;
use models\Comment;
use models\Product;
use models\User;
class ShoppingCartController
{
    public $shopping_cart;
    public $product;
    public $comment;
    public $user;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = Database::getInstance();
        $this->shopping_cart = new ShoppingCart($this->db_connection);
        $this->comment = new Comment($this->db_connection);
        $this->product = new Product($this->db_connection);
        $this->user = new User($this->db_connection);

    }

    public function create($id)
    {
        $product=$this->product->show($id)->fetch_assoc();
        $result=$this->comment->show($id);
        $comments=$result->fetch_all(MYSQLI_ASSOC);
        $row=$result->num_rows;
        if(isset($_POST['user_id1']) && isset($_POST['count']) && $_POST['user_id1'] && $_POST['count']){
            $this->shopping_cart->user_id=$_POST['user_id1'];
            $this->shopping_cart->count=$_POST['count'];
            $this->shopping_cart->product_id=$id;
            $this->shopping_cart->create();
        }
        require_once __DIR__ . '/../views/products/show.php';
    }

    public function show($id)
    {
        $user=$this->user->show($id)->fetch_assoc();
        $shopping_carts=$this->shopping_cart->show($id)->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/shoppingcart/show.php';

    }
}
