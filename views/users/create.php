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
<h3 class="m-3">ایجاد کاربر جدید :</h3>
<form  action="../user/store" method="post">
    <div class="col-3">
        <label class="form-label" for="first_name">نام:</label>
        <input class="form-control " type="text" name="first_name" id="first_name">
    </div>
    <div class="col-3">
        <label class="form-label" for="last_name">نام خانوادگی :</label>
        <input class="form-control " type="text" name="last_name" id="last_name">
    </div>
    <div class="col-3">
        <label class="form-label" for="age">سن :</label>
        <input class="form-control " type="number" name="age" id="age">
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
</form>
</body>
</html>


