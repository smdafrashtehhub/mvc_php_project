<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Document</title>
</head>
<?php
echo '<h3 class="m-3 ">' . 'لیست خریدهای:  ' . $user['first_name'] . ' ' . $user['last_name'] . '</h3>';
?>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>نام محصول</th>
        <th>توضیحات</th>
        <th>قیمت یک عدد محصول</th>
        <th>قیمت کل</th>
        <th> تعداد خریداری شده</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($buys as $buy){
        echo '<tr>';
        echo '<td><a href="./show.php?id='.$buy['id'].'">'.$buy['name'].'</a></td>';
        echo '<td>'.$buy['description'].'</td>';
        echo '<td>'.$buy['price'].'</td>';
        echo '<td>'.$buy['price']*$buy['product_count'].'</td>';
        echo '<td>'.$buy['product_count'].'</td>';
    }
    ?></tbody>
</table>
