<?php

namespace models;
require_once __DIR__ . '/UserModelInterface.php';

class User implements UserModelInterface
{
    private $table = 'users';
    private $connection;
    public $first_name, $last_name, $age;

    public function __construct($db_connection)
    {
        $this->connection = $db_connection;
    }

    public function index()
    {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->connection->query($query);
        return $result;
    }

    public function store()
    {

        $query = "INSERT INTO " . $this->table . "(first_name,last_name,age)
               VALUE(
               '" . $this->first_name . "',
               '" . $this->last_name . "',
               '" . $this->age . "'
               )";

        return $this->connection->query($query);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id='" . $id . "'";
        return $this->connection->query($query);
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " WHERE id='" . $id . "'";
        $this->connection->query($query);
    }

    public function show($id)
    {
        $query = "SELECT * FROM users WHERE id=$id";
        $result = $this->connection->query($query);
        return $result;
    }

    public function update()
    {
        $query = "UPDATE users SET
        first_name='" . $_POST['first_name'] . "',
        last_name='" . $_POST['last_name'] . "',
        age='" . $_POST['age'] . "'
        WHERE id='" . $_SESSION['user_id'] . "'";

        $result = $this->connection->query($query);

        return $result;
    }

    public function buyList($id)
    {
        $query="SELECT U.*,P.*,SUM(PUB.count) AS product_count FROM users U
                INNER JOIN product_user_buy PUB ON U.id=PUB.user_id
                INNER JOIN products P ON P.id=PUB.product_id
                where (U.id=$id)
                GROUP BY U.id,P.id";

        return $this->connection->query($query);
    }

    public function buy($product_id,$user)
    {

        $query="SELECT U.*,P.*,SUM(PU.count) AS product_count FROM users U
                INNER JOIN product_user PU ON U.id=PU.user_id
                INNER JOIN products P ON P.id=PU.product_id
                WHERE U.id='".$user['id']."'
                AND P.id=$product_id
                GROUP BY U.id,P.id";
        $result=$this->connection->query($query);
        $user_product=$result->fetch_assoc();
        $shopping_cart_count=$user_product['product_count'];

        $query="SELECT * FROM products WHERE id=$product_id";
        $result=$this->connection->query($query);
        $product=$result->fetch_assoc();
        $product_count=$product['count'];
        if($shopping_cart_count > $product_count){
            echo '<h3>تعداد موجود نیست</h3>';
            die();
        }
        else{
            $query="INSERT INTO product_user_buy(user_id,product_id,count) VALUES(
                   '". $user['id']."',
                   '". $product_id."',
                   '". $shopping_cart_count."'
                    )";
            $this->connection->query($query);

            $product_count_new=$product_count - $shopping_cart_count;
            $query="UPDATE products SET
                    count=$product_count_new
                    WHERE id=$product_id
                    ";
            $this->connection->query($query);

            $query="DELETE FROM product_user
                    WHERE user_id='".$user['id']."'
                    AND product_id=$product_id";
            $this->connection->query($query);

//            $query="SELECT * from product_user_buy PUB
//                    WHERE PUB.product_id=$product_id
//                    AND PUB.user_id='".$user['id']."'";
//            $result=$this->connection->query($query);
//            $buy=$result->fetch_assoc();
//            $buy_count=$buy['count'];
//            var_dump($buy_count);
//            die();

        }
    }
}
