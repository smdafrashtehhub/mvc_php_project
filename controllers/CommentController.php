<?php
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . "/../database/Database.php";
use models\Comment;
use models\Product;
class CommentController
{
    public $comment;
    public $product;
    private $db_connection;
    public function __construct(){
        $this->db_connection = Database::getInstance();
        $this->comment = new Comment($this->db_connection);
        $this->product = new Product($this->db_connection);
    }

    public function index()
    {
       return $comments=$this->comment->index()->fetch_all(MYSQLI_ASSOC);
    }

    public function create($id)
    {
        if(isset($_POST['title']) && isset($_POST['description'])&& isset($_POST['user_id']) && $_POST['title'] && $_POST['description']&& $_POST['user_id']){
            $this->comment->title= $_POST['title'];
            $this->comment->description= $_POST['description'];
            $this->comment->user_id= $_POST['user_id'];
            $this->comment->product_id= $id;
            $this->comment->create($id);
        }
        $product=$this->product->show($id)->fetch_assoc();
        $result=$this->comment->show($id);
        $comments=$result->fetch_all(MYSQLI_ASSOC);
        $row=$result->num_rows;
        require_once __DIR__ . '/../views/products/show.php';
    }
}