<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h3 class="m-3">لیست کاربران : </h3>
<?php
echo '<td><a class="btn btn-primary text text-white m-3"  href="../user/create">  ایجاد کاربر جدید  <a></td>';
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>نام و نام خانوادگی کاربر</th>
        <th>سن کاربر</th>
        <th>سبد خرید</th>
        <th>خریدها</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td><a href="./show.php?id=' . $user['id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '</a></td>';
        echo '<td>' . $user['age'] . '</td>';
        echo '<td><a class="btn btn-primary text text-white "  href="../shopping_cart/show/' . $user['id'] . '">  سبد خرید  <a></td>';
        echo '<td><a class="btn btn-primary text text-white "  href="./buy_list/' . $user['id'] . '">  لیست خرید ها  <a></td>';
        echo '<td>
                <a class="btn btn-primary text text-white "  href="./show/' . $user['id'] . '">  نمایش  <a>
                <a class="btn btn-danger text text-white "  href="./delete/' . $user['id'] . '">  حذف  <a>
                <a class="btn btn-primary text text-white "  href="./edit/' . $user['id'] . '">  ویرایش  <a>
              </td>';

    } ?>
    </tbody>
</table>
</body>