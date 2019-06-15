<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-4 col-md-offset-4">
                <h2>计算</h2>
                <form action="/tool/ex/count" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="salary-rate">salary rate</label>
                        <input type="salary-rate" name="salary-rate" class="form-control" id="salary-rate" placeholder="salary rate" autocomplete="off" disableautocomplete>
                    </div>
                    <div class="form-group">
                        <label for="current-rate">current rate</label>
                        <input type="current-rate" name="current-rate" class="form-control" id="current-rate" placeholder="current-rate" autocomplete="off" disableautocomplete>
                    </div>
                    <div class="form-group">
                        <label for="salary-amount">salary amount</label>
                        <input type="salary-amount" name="salary-amount" class="form-control" id="salary-amount" placeholder="salary amount" autocomplete="off" disableautocomplete>
                    </div>

                    <button type="submit" class="btn btn-default">Count</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>