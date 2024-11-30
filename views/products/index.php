<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Document</title>
</head>

<h3>لیست محصولات</h3>
<form class="form row m-3" action="./search" method="POST">
    <div class="col-2">
        <label>نام محصول : </label>
        <input class=" form-control col-3" type="text" name="search" >
    </div>
    <div class="col-2">
        <label> از تاریخ  : </label>
        <input class="form-control" type="date" name="start_date">
    </div>
    <div class="col-2">
        <label> تا تاریخ  : </label>
        <input class="form-control" type="date" name="end_date">
    </div>
    <div class="col-2">
        <label>  از قیمت  : </label>
        <input class="form-control" type="number" name="start_price">
    </div>
    <div class="col-2">
        <label> تا قیمت  : </label>
        <input class="form-control" type="number" name="end_price">
    </div>
    <div class="col-2">
        <label> دسته بندی  : </label>
        <select class="form-control" name="category" id="category">
            <option value="">دسته بندی را انتخاب کنید</option>
            <?php
            foreach ($categories as $category)
            {
                echo '<option value='.$category["id"].'>'.$category["name"].'</option>';
            }
            ?>
        </select>
    </div>
    <button class="col-1 btn btn-primary m-3" type="submit">جستجو</button>
</form>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>نام محصول</th>
        <th>توضیحات</th>
        <th>دسته بندی</th>
        <th>تعداد موجود</th>
        <th>تاریخ ایجاد</th>
        <th>قیمت</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($products as $product){

        echo '<tr>';
        echo '<td><a href="./show/'.$product['id'].'">'.$product['name'].'</a></td>';
        echo '<td>'.$product['description'].'</td>';
        echo '<td>'.$product['category_name'].'</td>';
        echo '<td>'.$product['count'].'</td>';
        echo '<td>'.$product['created_at'].'</td>';
        echo '<td>'.$product['price'].'</td>';
        echo '<td><a class="btn btn-primary" href="./edit/'.$product['id'].'">ویرایش</a> </td>';
    }
    ?></tbody>
</table>
