<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
    <script src="/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <title>Document</title>
    <style>
        .message-box {border:1px solid #ccc;border-radius: 8px;height:500px;}
    </style>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-4 col-md-offset-4">
            <h2>Chat</h2>
            <div class="message-box">
                <dl class="dl-horizontal">

                </dl>
            </div>
            <div class="send-box">
                <input type="text" class="input-sm message-input" name="message">
                <button class="btn btn-default message-send-btn" type="button">发送</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var ws = new WebSocket('ws://127.0.0.1:3001');
        ws.onopen = function (data) {
            console.log(data);
        }
        ws.onmessage = function (data) {
            console.log(data);
        }
        ws.onclose = function (data) {
            console.log(data);
        }

        $('.message-send-btn').click(function () {
            var msg = $('.message-input').val();
            var msgData = {
                msg:msg
            };
            ws.send(JSON.stringify(msgData));
        });
    });

</script>
</body>
</html>