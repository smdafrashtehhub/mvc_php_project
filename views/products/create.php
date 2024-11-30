
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
    <h3>ایجاد محصول جدید:</h3>
    <form  action="store" method="post">
        <div class="col-3">
            <label class="form-label" for="name">نام محصول:</label>
            <input class="form-control " type="text" name="name" id="name">
        </div>
        <div class="col-3">
            <label class="form-label" for="description">توضیحات :</label>
            <input class="form-control " type="text" name="description" id="description">
        </div>
        <div class="col-3">
            <label class="form-label" for="price">قیمت :</label>
            <input class="form-control " type="number" name="price" id="price">
        </div>
        <div class="col-3">
            <label class="form-label" for="count">تعداد :</label>
            <input class="form-control " type="number" name="count" id="count">
        </div>
        <div class="col-3">
            <label class="form-label" for="count">دسته بندی :</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">دسته بندی موردنظر را وارد کنید</option>
                <?php
                foreach ($categories as $category)
                {
                    echo '<option value='.$category["id"].'>'.$category["name"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="col m-3">
            <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
    </form>
    </body>
    </html>







