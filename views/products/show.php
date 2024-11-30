<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Document</title>
</head>
<body>
<?php

echo '<h4>نام محصول : </h4>';
echo '<h6>'.$product['name'].'</h6>';
echo '<h4>توضیحات : </h4>';
echo '<h6>'.$product['description'].'</h6>';
echo '<h4>قیمت : </h4>';
echo '<h6>'.$product['price'].'</h6>';
echo '<h4>تعداد : </h4>';
echo '<h6>'.$product['count'].'</h6>';

?>

<form  action="../../shopping_cart/create/<?php echo $product['id']?>" method="post">

    <div class="col-3">
        <label class="form-label" for="user_id1">شناسه کاربر :</label>
        <input class="form-control " type="number" name="user_id1" id="user_id1">
    </div>
    <div class="col-3">
        <label class="form-label" for="count">تعداد سفارش :</label>
        <input class="form-control " type="number" name="count" id="count">
    </div>
    <div class="col-3 m-3">
        <button type="submit" class="btn btn-primary">افزودن به سبد خرید</button>
    </div>

</form>

<form  action="../../comment/create/<?php echo $product['id'];?>" method="post">

    <div class="col-3">
        <label class="form-label" for="title">عنوان نظر :</label>
        <input class="form-control "  name="title" id="title">
    </div>
    <div class="col-3">
        <label class="form-label" for="description">نظر شما :</label>
        <textarea class="form-control "  name="description" id="description"></textarea>
    </div>
    <div class="col-3">
        <label class="form-label" for="user_id">شناسه کاربر :</label>
        <input class="form-control " type="number" name="user_id" id="user_id">
    </div>
    <div class="col-3 m-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>

</form>
<?php

echo '<h1>نظرات : </h1>';

if($row){
    foreach($comments as $comment){
        echo '<h4>نظر : '.$comment['first_name'].' '.$comment['last_name'].'</h4>';
        echo '<h6>'.$comment['description'].'</h6>';

    }
}



?>
</body>

