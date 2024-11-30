<?php
namespace models;
class ShoppingCart
{
    private $table = 'product_user';
    private $connection;
    public $user_id, $product_id, $count;

    public function __construct($db_connection)
    {
        $this->connection = $db_connection;
    }

    public function create()
    {
        $query="INSERT INTO $this->table(user_id,product_id,count)
                VALUES(
                       '".$this->user_id."',
                       '".$this->product_id."',
                       '".$this->count."'
                       )";
        $this->connection->query($query);
    }

    public function show($id)
    {
        $query="SELECT U.*,P.*,P.id AS product_id,SUM(PU.count) AS product_count FROM users U
                INNER JOIN product_user PU ON U.id=PU.user_id
                INNER JOIN products P ON P.id=PU.product_id
                where(U.id=$id)
                GROUP BY U.id,P.id";
        return $this->connection->query($query);
    }

}