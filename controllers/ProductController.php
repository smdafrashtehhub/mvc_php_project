<?php

//namespace controllers;
//use Database;

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . "/../database/Database.php";

use models\Category;
use models\Product;
use models\Comment;
class ProductController
{
    public $product;
    public $category;
    public $comment;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = Database::getInstance();
        $this->product = new Product($this->db_connection);
        $this->category = new Category($this->db_connection);
        $this->comment = new Comment($this->db_connection);
    }

    public function show($id)
    {
        $result=$this->comment->show($id);
        $comments=$result->fetch_all(MYSQLI_ASSOC);
        $row=$result->num_rows;
        $product=$this->product->show($id)->fetch_assoc();
        require_once __DIR__ . '/../views/products/show.php';
    }
    public function create()
    {
        $categories = $this->category->index()->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/products/create.php';
    }

    public function store()
    {
        date_default_timezone_set('Asia/Tehran');
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        if ($_POST) {
            $this->product->name = $_POST['name'];
            $this->product->count = $_POST['count'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            $this->product->category_id = $_POST['category_id'];
            $this->product->created_at = $formattedDateTime;
        }
        $this->product->store();
        header("location:./index");

    }

    public function index()
    {
        $products = $this->product->category()->fetch_all(MYSQLI_ASSOC);
        $categories = $this->category->index()->fetch_all(MYSQLI_ASSOC);
        require_once __DIR__ . '/../views/products/index.php';
    }

    public function edit($id)
    {
        $product=$this->product->show($id)->fetch_assoc();
        require_once __DIR__ . '/../views/products/edit.php';
    }

    public function update($id)
    {
        $this->product->name=$_POST['name'];
        $this->product->description=$_POST['description'];
        $this->product->price=$_POST['price'];
        $this->product->count=$_POST['count'];
        $this->product->update($id);
        header("location:../index");

    }
    public function search()
    {
        if ((isset($_POST['search']) && $_POST['search']) ||
            isset($_POST['start_date']) && $_POST['start_date'] ||
            isset($_POST['end_date']) && $_POST['end_date'] ||
            isset($_POST['start_price']) && $_POST['start_price'] ||
            isset($_POST['end_price']) && $_POST['end_price'] ||
            isset($_POST['category']) && $_POST['category'])
        {
            $categories=$this->category->index();
            $products=$this->product->search()->fetch_all(MYSQLI_ASSOC);
            require_once __DIR__ . '/../views/products/index.php';
        }
        else
        header("location:./index");

    }

    public function createShoppingCart($id)
    {
        if($_POST['user_id1'] && $_POST['count'])
        {
            $this->product->createShoppingCart($id);
        }
    }
}