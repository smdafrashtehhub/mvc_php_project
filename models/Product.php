<?php

namespace models;
class Product
{
    private $table = 'products';
    private $connection;
    public $name, $price, $description, $count, $created_at, $category_id;

    public function __construct($db_connection)
    {
        $this->connection = $db_connection;
    }

    public function show($id)
    {
        $query="SELECT * FROM products WHERE id=$id";
        return $this->connection->query($query);
    }
    public function store()
    {
        $query = "INSERT INTO " . $this->table . "(name,price,description,count,created_at,category_id)
                            VALUES(
                            '" . $this->name . "',
                            '" . $this->price . "',
                            '" . $this->description . "',
                            '" . $this->count . "',
                            '" . $this->created_at . "',
                            '" . $this->category_id . "'
                            )";
//        var_dump($query);
//        die();
        $this->connection->query($query);
    }

    public function index()
    {
        $query = "SELECT * FROM " . $this->table;
        return $this->connection->query($query);
    }

    public function update($id)
    {
        $query="UPDATE products SET
            name='".$this->name."',
            description='".$this->description."',
            price='".$this->price."',
            count='".$this->count."'
        WHERE id=$id";
        $this->connection->query($query);
    }
    public function category()
    {
        $query = "SELECT products.*,categories.name AS category_name FROM products
                INNER JOIN categories ON products.category_id=categories.id";
        return $this->connection->query($query);
    }

    public function search()
    {
        $query = "SELECT P.*,C.name AS category_name  from products P
            INNER JOIN categories C ON P.category_id=C.id
            WHERE (P.name='" . $_POST['search'] . "' OR '" . $_POST['search'] . "'='')
            AND (SUBSTRING(P.created_at,1,10) >='" . $_POST['start_date'] . "' OR '" . $_POST['start_date'] . "'='')
            AND (SUBSTRING(P.created_at,1,10) <='" . $_POST['end_date'] . "' OR '" . $_POST['end_date'] . "'='')
            AND (P.price >='" . $_POST['start_price'] . "' OR '" . $_POST['start_price'] . "'='') 
            AND (P.price <='" . $_POST['end_price'] . "' OR '" . $_POST['end_price'] . "'='') 
            AND (P.category_id ='" . $_POST['category'] . "' OR '" . $_POST['category'] . "'='')
            ";

            return $this->connection->query($query);
    }

    public function createShoppingCart($id)
    {

    }
}


