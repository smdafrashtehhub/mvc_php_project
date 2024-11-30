<?php
namespace models;
class Comment
{
    private $table='comments';
    private $connection;
    public $title,$description,$user_id,$product_id;

    public function __construct($db_connection)
    {
        $this->connection=$db_connection;
    }
    public function index()
    {
        $query="SELECT * FROM comments";
        return $this->connection->query($query);
    }
    public function show($product_id)
    {
        $query="SELECT * FROM comments C
                INNER JOIN users U ON C.user_id=U.id      
                WHERE C.product_id=$product_id";
        return $this->connection->query($query);
    }

    public function create($product_id)
    {
        $query="INSERT INTO $this->table(title,description,user_id,product_id)
                VALUES(
                       '".$this->title."',
                       '".$this->description."',
                       '".$this->user_id."',
                       '".$this->product_id."'
                )";
        $this->connection->query($query);
    }
}